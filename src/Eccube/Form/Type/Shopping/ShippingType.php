<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eccube\Form\Type\Shopping;

use Eccube\Common\EccubeConfig;
use Eccube\Entity\Delivery;
use Eccube\Entity\DeliveryTime;
use Eccube\Entity\Shipping;
use Eccube\Repository\DeliveryFeeRepository;
use Eccube\Repository\DeliveryRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ShippingType extends AbstractType
{
    /**
     * @var EccubeConfig
     */
    protected $eccubeConfig;

    /**
     * @var DeliveryRepository
     */
    protected $deliveryRepository;

    /**
     * @var DeliveryFeeRepository
     */
    protected $deliveryFeeRepository;

    /**
     * ShippingType constructor.
     *
     * @param EccubeConfig $eccubeConfig
     * @param DeliveryRepository $deliveryRepository
     * @param DeliveryFeeRepository $deliveryFeeRepository
     */
    public function __construct(EccubeConfig $eccubeConfig, DeliveryRepository $deliveryRepository, DeliveryFeeRepository $deliveryFeeRepository)
    {
        $this->eccubeConfig = $eccubeConfig;
        $this->deliveryRepository = $deliveryRepository;
        $this->deliveryFeeRepository = $deliveryFeeRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'OrderItems',
                CollectionType::class,
                [
                    'entry_type' => OrderItemType::class,
                ]
            );

        // ???????????????????????????????????????
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) {
                /* @var Shipping $Shipping */
                $Shipping = $event->getData();
                if (is_null($Shipping) || !$Shipping->getId()) {
                    return;
                }

                // ????????????????????????????????????????????????.
                $OrderItems = $Shipping->getProductOrderItems();
                $SaleTypes = [];
                foreach ($OrderItems as $OrderItem) {
                    $ProductClass = $OrderItem->getProductClass();
                    $SaleType = $ProductClass->getSaleType();
                    $SaleTypes[$SaleType->getId()] = $SaleType;
                }
                // ?????????????????????????????????????????????.
                $Deliveries = $this->deliveryRepository->getDeliveries($SaleTypes);

                // ??????????????????????????????????????????.
                $form = $event->getForm();
                $form->add(
                    'Delivery',
                    EntityType::class,
                    [
                        'required' => false,
                        'label' => 'shipping.label.delivery_hour',
                        'class' => 'Eccube\Entity\Delivery',
                        'choice_label' => 'name',
                        'choices' => $Deliveries,
                        'placeholder' => false,
                        'constraints' => [
                            new NotBlank(),
                        ],
                    ]
                );
            }
        );

        // ???????????????????????????????????????
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) {
                $Shipping = $event->getData();
                if (is_null($Shipping) || !$Shipping->getId()) {
                    return;
                }

                // ?????????????????????
                $minDate = 0;
                $deliveryDurationFlag = false;

                // ????????????????????????????????????????????????
                foreach ($Shipping->getOrderItems() as $detail) {
                    $ProductClass = $detail->getProductClass();
                    if (is_null($ProductClass)) {
                        continue;
                    }
                    $deliveryDuration = $ProductClass->getDeliveryDuration();
                    if (is_null($deliveryDuration)) {
                        continue;
                    }
                    if ($deliveryDuration->getDuration() < 0) {
                        // ?????????????????????????????????????????????????????????????????????????????????
                        $deliveryDurationFlag = false;
                        break;
                    }

                    if ($minDate < $deliveryDuration->getDuration()) {
                        $minDate = $deliveryDuration->getDuration();
                    }
                    // ????????????????????????????????????
                    $deliveryDurationFlag = true;
                }

                // ?????????????????????????????????
                $deliveryDurations = [];

                // ????????????????????????????????????
                if ($deliveryDurationFlag) {
                    $period = new \DatePeriod(
                        new \DateTime($minDate.' day'),
                        new \DateInterval('P1D'),
                        new \DateTime($minDate + $this->eccubeConfig['eccube_deliv_date_end_max'].' day')
                    );

                    // ???????????????
                    $dateFormatter = \IntlDateFormatter::create(
                        'ja_JP@calendar=japanese',
                        \IntlDateFormatter::FULL,
                        \IntlDateFormatter::FULL,
                        'Asia/Tokyo',
                        \IntlDateFormatter::TRADITIONAL,
                        'E'
                    );

                    foreach ($period as $day) {
                        $deliveryDurations[$day->format('Y/m/d')] = $day->format('Y/m/d').'('.$dateFormatter->format($day).')';
                    }
                }

                $form = $event->getForm();
                $form
                    ->add(
                        'shipping_delivery_date',
                        ChoiceType::class,
                        [
                            'choices' => array_flip($deliveryDurations),
                            'required' => false,
                            'placeholder' => 'common.select__unspecified',
                            'mapped' => false,
                            'data' => $Shipping->getShippingDeliveryDate() ? $Shipping->getShippingDeliveryDate()->format('Y/m/d') : null,
                        ]
                    );
            }
        );
        // ??????????????????????????????????????????
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) {
                /** @var Shipping $Shipping */
                $Shipping = $event->getData();
                if (is_null($Shipping) || !$Shipping->getId()) {
                    return;
                }

                $ShippingDeliveryTime = null;
                $DeliveryTimes = [];
                $Delivery = $Shipping->getDelivery();
                if ($Delivery) {
                    $DeliveryTimes = $Delivery->getDeliveryTimes();
                    $DeliveryTimes = $DeliveryTimes->filter(function (DeliveryTime $DeliveryTime) {
                        return $DeliveryTime->isVisible();
                    });

                    foreach ($DeliveryTimes as $deliveryTime) {
                        if ($deliveryTime->getId() == $Shipping->getTimeId()) {
                            $ShippingDeliveryTime = $deliveryTime;
                            break;
                        }
                    }
                }

                $form = $event->getForm();
                $form->add(
                    'DeliveryTime',
                    EntityType::class,
                    [
                        'label' => 'front.shopping.delivery_time',
                        'class' => 'Eccube\Entity\DeliveryTime',
                        'choice_label' => 'deliveryTime',
                        'choices' => $DeliveryTimes,
                        'required' => false,
                        'placeholder' => 'common.select__unspecified',
                        'mapped' => false,
                        'data' => $ShippingDeliveryTime,
                    ]
                );
            }
        );

        // POST????????????????????????????????????????????????????????????.
        // TODO PurchaseFlow ?????????????????????.
        $builder->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
            /** @var Shipping $Shipping */
            $Shipping = $event->getData();
            $form = $event->getForm();
            /** @var Delivery $Delivery */
            $Delivery = $form['Delivery']->getData();
            if ($Delivery) {
                $Shipping->setShippingDeliveryName($Delivery->getServiceName());
            } else {
                $Shipping->setShippingDeliveryName(null);
            }
            $DeliveryDate = $form['shipping_delivery_date']->getData();
            if ($DeliveryDate) {
                $Shipping->setShippingDeliveryDate(new \DateTime($DeliveryDate));
            } else {
                $Shipping->setShippingDeliveryDate(null);
            }

            $DeliveryTime = $form['DeliveryTime']->getData();
            if ($DeliveryTime) {
                $Shipping->setShippingDeliveryTime($DeliveryTime->getDeliveryTime());
                $Shipping->setTimeId($DeliveryTime->getId());
            } else {
                $Shipping->setShippingDeliveryTime(null);
                $Shipping->setTimeId(null);
            }
        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => 'Eccube\Entity\Shipping',
            ]
        );
    }

    public function getBlockPrefix()
    {
        return '_shopping_shipping';
    }
}

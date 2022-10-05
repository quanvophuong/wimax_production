<?php

namespace Customize\Form\Extension;

use Eccube\Form\Type\Front\EntryType;
use Symfony\Component\Form\AbstractTypeExtension;
use Eccube\Form\DataTransformer;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Eccube\Entity\Master\Sex;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class EntryTypeExtension extends AbstractTypeExtension
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;
    
    /**
     * ProductClassType constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        EntityManagerInterface $entityManager
    ) {
        $this->entityManager = $entityManager;
    }

    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {
        return EntryType::class;
    }

    /**
     * {@inheritdoc}
     */
    public static function getExtendedTypes(): iterable
    {
        yield EntryType::class;
    }
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        // $builder->add('card_number', TextType::class, $options);
        // $builder->add('card_year', TextType::class, $options);
        // $builder->add('card_month', TextType::class, $options);
        // $builder->add('card_owner', TextType::class, $options);
        // $builder->add('card_cvc', TextType::class, $options);

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $Customer = $event->getData();
            if (empty( $Customer ->getSex())) {
                $SexDefault = $this->entityManager->getRepository(Sex::class)->find(1);
                $Customer->setSex($SexDefault);
            }
           
        });

    }
}
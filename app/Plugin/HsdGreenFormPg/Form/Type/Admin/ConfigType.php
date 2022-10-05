<?php

namespace Plugin\HsdGreenFormPg\Form\Type\Admin;

use Doctrine\ORM\EntityManagerInterface;
use Plugin\HsdGreenFormPg\Entity\Config;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ConfigType extends AbstractType
{
    protected $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // ページのurl（ルーティング名）を取得
        $em = $this->entityManager;
        $cho = array();
        $stmt = $em->getConnection()->prepare("select page_name,url from dtb_page where edit_type = 2 order by id asc");
        $stmt->execute();
        $rs = $stmt->fetchAll();

        // 受注時にGreenFormの顧客リストへ登録するかの選択
        $order_to_greenformreg_sel = array('登録しない' => 'not_reg', '登録する' => 'reg');

        foreach($rs as $item){
            if( $item['url'] != 'preview' ){
                $dmy = $item['url'] . '(' . $item['page_name'] . ')';
                $cho[$dmy] = $item['url'];
            }
        }

        $builder->add('greenform_id_1', TextType::class, [
            'constraints' => [
                new NotBlank(),
                new Length(['max' => 32]),
            ],
        ])
        ->add('form_height_1', TextType::class, [
            'constraints' => [
                new NotBlank(),
                new Length(['max' => 32]),
            ],
        ])
        ->add('route_1', ChoiceType::class, array(
            'choices' => $cho,
            'constraints' => array(
                new NotBlank(),
            ),
        ))
        ->add('greenform_id_2', TextType::class, [
            'required' => false,
            'constraints' => [new Length(['max' => 32])
            ],
        ])
        ->add('form_height_2', TextType::class, [
            'required' => false,
            'constraints' => [
                new Length(['max' => 32]),
            ],
        ])
        ->add('route_2', ChoiceType::class, array('choices' => $cho, 'required' => false))

        ->add('greenform_id_3', TextType::class, [
            'required' => false,
            'constraints' => [new Length(['max' => 32])
            ],
        ])
        ->add('form_height_3', TextType::class, [
            'required' => false,
            'constraints' => [
                new Length(['max' => 32]),
            ],
        ])
        ->add('route_3', ChoiceType::class, array('choices' => $cho, 'required' => false))

        ->add('greenform_id_4', TextType::class, [
            'required' => false,
            'constraints' => [new Length(['max' => 32])
            ],
        ])
        ->add('form_height_4', TextType::class, [
            'required' => false,
            'constraints' => [
                new Length(['max' => 32]),
            ],
        ])
        ->add('route_4', ChoiceType::class, array('choices' => $cho, 'required' => false))

        ->add('greenform_id_5', TextType::class, [
            'required' => false,
            'constraints' => [new Length(['max' => 32])
            ],
        ])
        ->add('form_height_5', TextType::class, [
            'required' => false,
            'constraints' => [
                new Length(['max' => 32]),
            ],
        ])
        ->add('route_5', ChoiceType::class, array('choices' => $cho, 'required' => false))

        ->add('greenform_id_6', TextType::class, [
            'required' => false,
            'constraints' => [new Length(['max' => 32])
            ],
        ])
        ->add('form_height_6', TextType::class, [
            'required' => false,
            'constraints' => [
                new Length(['max' => 32]),
            ],
        ])
        ->add('route_6', ChoiceType::class, array('choices' => $cho, 'required' => false))

        ->add('greenform_id_7', TextType::class, [
            'required' => false,
            'constraints' => [new Length(['max' => 32])
            ],
        ])
        ->add('form_height_7', TextType::class, [
            'required' => false,
            'constraints' => [
                new Length(['max' => 32]),
            ],
        ])
        ->add('route_7', ChoiceType::class, array('choices' => $cho, 'required' => false))

        ->add('greenform_id_8', TextType::class, [
            'required' => false,
            'constraints' => [new Length(['max' => 32])
            ],
        ])
        ->add('form_height_8', TextType::class, [
            'required' => false,
            'constraints' => [
                new Length(['max' => 32]),
            ],
        ])
        ->add('route_8', ChoiceType::class, array('choices' => $cho, 'required' => false))

        ->add('greenform_id_9', TextType::class, [
            'required' => false,
            'constraints' => [new Length(['max' => 32])
            ],
        ])
        ->add('form_height_9', TextType::class, [
            'required' => false,
            'constraints' => [
                new Length(['max' => 32]),
            ],
        ])
        ->add('route_9', ChoiceType::class, array('choices' => $cho, 'required' => false))

        ->add('greenform_id_10', TextType::class, [
            'required' => false,
            'constraints' => [new Length(['max' => 32])
            ],
        ])
        ->add('form_height_10', TextType::class, [
            'required' => false,
            'constraints' => [
                new Length(['max' => 32]),
            ],
        ])
        ->add('route_10', ChoiceType::class, array('choices' => $cho, 'required' => false))

        ->add('greenform_id_11', TextType::class, [
            'required' => false,
            'constraints' => [new Length(['max' => 32])
            ],
        ])
        ->add('form_height_11', TextType::class, [
            'required' => false,
            'constraints' => [
                new Length(['max' => 32]),
            ],
        ])
        ->add('route_11', ChoiceType::class, array('choices' => $cho, 'required' => false))

        ->add('greenform_id_12', TextType::class, [
            'required' => false,
            'constraints' => [new Length(['max' => 32])
            ],
        ])
        ->add('form_height_12', TextType::class, [
            'required' => false,
            'constraints' => [
                new Length(['max' => 32]),
            ],
        ])
        ->add('route_12', ChoiceType::class, array('choices' => $cho, 'required' => false))

        ->add('greenform_id_13', TextType::class, [
            'required' => false,
            'constraints' => [new Length(['max' => 32])
            ],
        ])
        ->add('form_height_13', TextType::class, [
            'required' => false,
            'constraints' => [
                new Length(['max' => 32]),
            ],
        ])
        ->add('route_13', ChoiceType::class, array('choices' => $cho, 'required' => false))

        ->add('greenform_id_14', TextType::class, [
            'required' => false,
            'constraints' => [new Length(['max' => 32])
            ],
        ])
        ->add('form_height_14', TextType::class, [
            'required' => false,
            'constraints' => [
                new Length(['max' => 32]),
            ],
        ])
        ->add('route_14', ChoiceType::class, array('choices' => $cho, 'required' => false))

        ->add('greenform_id_15', TextType::class, [
            'required' => false,
            'constraints' => [new Length(['max' => 32])
            ],
        ])
        ->add('form_height_15', TextType::class, [
            'required' => false,
            'constraints' => [
                new Length(['max' => 32]),
            ],
        ])
        ->add('route_15', ChoiceType::class, array('choices' => $cho, 'required' => false))
        ->add('order_to_greenformreg', ChoiceType::class, array('choices' => $order_to_greenformreg_sel, 'required' => true))
        ->add('og_greenform_id', TextType::class, [
            'required' => false,
            'constraints' => [
                new Length(['max' => 32]),
            ],
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Config::class,
        ]);
    }
}

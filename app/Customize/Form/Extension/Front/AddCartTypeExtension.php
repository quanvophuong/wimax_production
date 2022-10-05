<?php

declare(strict_types=1);

namespace Customize\Form\Extension\Front;

use Eccube\Form\Type\AddCartType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class AddCartTypeExtension extends AbstractTypeExtension
{
    public function getExtendedType(): string
    {
        return AddCartType::class;
    }

    public function getExtendedTypes(): iterable
    {
        return [AddCartType::class];
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('ship', TextType::class);
    }
}
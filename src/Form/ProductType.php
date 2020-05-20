<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\NotBlank;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'title',
                TextType::class,
                [
                    'required' => true,
                    'constraints' => [
                        new NotBlank(),
                    ]
                ]
            )
            ->add(
                'price',
                NumberType::class,
                [
                    'scale' => 2,
                    'required' => true,
                    'constraints' => [
                        new NotBlank(),
                        new GreaterThan(0)
                    ]

                ]
            )
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'btn btn-success save'],
            ]);
    }

}

<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Count;
class CartType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'product',
                EntityType::class,
                [
                    'class' => Product::class,
                    'multiple' => true,
                    'expanded' => true,
                    'constraints' => [
                        new Count(['min' => 1, 'max' =>3]),
                    ]
                ]
            )
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'btn btn-success save'],
            ]);
    }

}

<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;

class PupilleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Gx', IntegerType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ]
            )
            ->add('Gy', IntegerType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('Gz', IntegerType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('Dx', IntegerType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('Dy', IntegerType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('Dz', IntegerType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => "S'inscrire",
            ] )    
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}

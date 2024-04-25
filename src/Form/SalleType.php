<?php

namespace App\Form;

use App\Entity\Salle;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SalleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom_salle', TextType::class, [
            'attr' => ['class' => 'form-control'],
            'label_attr' => ['class' => 'form-label'],
        ])
        ->add('description_salle', TextareaType::class, [
            'attr' => ['class' => 'form-control'],
            'label' => 'Product Description',
            'label_attr' => ['class' => 'form-label'],
        ])
        ->add('region_salle', ChoiceType::class, [
            'choices' => [
                'Tunis' => 'Tunis',
                'Ariana' => 'Ariana',
                'Gafsa' => 'Gafsa',
            ],
            'attr' => ['class' => 'form-select'],
            'label' => 'Niveau de la classe',
        ])
        ->add('image', FileType::class, [
            'label' => 'Chargez ici une photo',
            'required' => false,
            'mapped' => false,
            'attr' => ['class' => 'form-control-file'],
            'label_attr' => ['class' => 'form-label'],
        ])
        ->add('adresse_salle', TextType::class, [
            'attr' => ['class' => 'form-control'],
            'label_attr' => ['class' => 'form-label'],
        ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Salle::class,
        ]);
    }
}

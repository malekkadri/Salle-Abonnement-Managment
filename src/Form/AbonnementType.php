<?php

namespace App\Form;

use App\Entity\Abonnement;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AbonnementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('duree_abonnement', TextType::class, [
            'attr' => ['class' => 'form-control'],
            'label_attr' => ['class' => 'form-label'],
        ])
        ->add('prix_abonnement', TextType::class, [
            'attr' => ['class' => 'form-control'],
            'label_attr' => ['class' => 'form-label'],
        ])
        ->add('date_deb_abonnement')
        ->add('date_fin_abonnement')
        ->add('salle');
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Abonnement::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\FormReservation;
use App\Entity\Statut;
use App\Entity\User;
use App\Entity\Voyage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombreVoyageur')
            ->add('message')
            ->add('voyage', EntityType::class, [
                'class' => Voyage::class,
                'choice_label' => 'nom',
            ])
            ->add('statut', EntityType::class, [
                'class' => Statut::class,
                'choice_label' => 'nom',
            ])
            // ->add('user', EntityType::class, [
            //     'class' => User::class,
            //     'choice_label' => 'nom',
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FormReservation::class,
        ]);
    }
}

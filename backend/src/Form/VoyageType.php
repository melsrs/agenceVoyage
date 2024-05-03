<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Pays;
use App\Entity\User;
use App\Entity\Voyage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoyageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('image')
            ->add('prix')
            ->add('datedepart', null, [
                'widget' => 'single_text',
            ])
            ->add('datearrivee', null, [
                'widget' => 'single_text',
            ])
            ->add('description')
            ->add('moyentransport')
            ->add('Pays', EntityType::class, [
                'class' => Pays::class,
                'choice_label' => 'nom',
            ])
            ->add('Categorie', EntityType::class, [
                'class' => Categorie::class,
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
            'data_class' => Voyage::class,
        ]);
    }
}

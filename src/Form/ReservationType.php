<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('date')
        ->add('des', TextareaType::class,array( 'attr' => array(
            'placeholder' => 'Description')))
        ->add('evenement',EntityType::class,['class'=> Evenement::class,
        'choice_label'=> 'nom',
        'label' => 'nom'

    ])

    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}

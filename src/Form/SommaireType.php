<?php

namespace App\Form;

use App\Entity\Sommaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SommaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ajout', ChoiceType::class,[
                'choices'  => [
                    'Oui' => 'Intention de soumissionner',
                    "Non" => null,
                ],
                'label' => 'Intention de soumissionner',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sommaire::class,
        ]);
    }
}

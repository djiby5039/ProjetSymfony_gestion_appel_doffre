<?php

namespace App\Form;

use App\Entity\LettreDeRetrait;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class LettreDeRetraitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateType::class, [
                'years' => range(2005, 2100),
            ])
            ->add('lieu')
            ->add('destinataire')
            ->add('adr_desti')
            ->add('reference')
            ->add('num_offre')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LettreDeRetrait::class,
        ]);
    }
}

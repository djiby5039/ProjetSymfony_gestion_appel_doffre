<?php

namespace App\Form;

use App\Entity\Pagedegarde;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PagedegardeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero_copieoriginal')
            ->add('numero_copie1')
            ->add('numero_copie2')
            ->add('numero_copie3')
            ->add('numero_copie4')
            ->add('numero_copie5')
            ->add('numero_copiebureau')
            ->add('nom_etablissement')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pagedegarde::class,
        ]);
    }
}

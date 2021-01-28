<?php

namespace App\Form;

use App\Entity\Offredappel;
use App\Entity\Reponseoffredappel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffredappelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numeroOffre')
        ;
        $builder->add('reponses', CollectionType::class, [
            'entry_type' => ReponseoffredappelType::class,
            'entry_options' => ['label' => false],
            'allow_add' => true,
            'by_reference' => false,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Offredappel::class,
        ]);
    }
}

<?php

namespace Walva\NatagoraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('formateur')
            ->add('lieu')
            ->add('type')
            ->add('etat')
            ->add('min')
            ->add('max')
            ->add('description')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Walva\NatagoraBundle\Entity\Evenement'
        ));
    }

    public function getName()
    {
        return 'walva_natagorabundle_evenementtype';
    }
}

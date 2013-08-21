<?php

namespace Walva\NatagoraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EleveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('mail')
            ->add('tel')
            ->add('gsm1')
            ->add('gsm2')
            ->add('codePostal')
            ->add('pays')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Walva\NatagoraBundle\Entity\Eleve'
        ));
    }

    public function getName()
    {
        return 'walva_natagorabundle_elevetype';
    }
}

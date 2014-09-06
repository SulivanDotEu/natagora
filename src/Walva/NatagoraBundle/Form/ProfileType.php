<?php

namespace Walva\NatagoraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProfileType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nom')
                ->add('prenom')
                ->add('tel')
                ->add('gsm1')
                ->add('gsm2')
                ->add('codePostal')
                ->add('pays')
                ->add('email')
                
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Walva\NatagoraBundle\Entity\Eleve'
        ));
    }

    public function getName() {
        return 'walva_natagorabundle_profiletype';
    }

}

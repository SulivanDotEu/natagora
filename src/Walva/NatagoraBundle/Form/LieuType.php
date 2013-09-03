<?php

namespace Walva\NatagoraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LieuType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nom')
                ->add('rendezvous')
                ->add('ville')
                ->add('codePostal')
                ->add('rue')
                ->add('numero')
                ->add('latitude')
                ->add('longitude')
                ->add('urlGoogleMap')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Walva\NatagoraBundle\Entity\Lieu'
        ));
    }

    public function getName() {
        return 'walva_natagorabundle_lieutype';
    }

}

<?php

namespace Walva\NatagoraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Walva\NatagoraBundle\Entity\Evenement;

class EvenementType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('date')
                ->add('formateur', 'entity', array(
                    'class' => 'WalvaNatagoraBundle:Formateur',
                ))
                ->add('formations', 'entity', array(
                    'class' => 'WalvaNatagoraBundle:Formation',
                    'property' => 'nom',
                    'multiple' => 'true',
                ))
                ->add('type', 'choice', array(
                    'choices' => array(
                    Evenement::$TYPE_SORTIE => 'Sortie',
                    Evenement::$TYPE_VOYAGE => 'Voyage',
                    Evenement::$TYPE_WEEKEND => 'Weekend',
                    ),
                    'required' => true,
                ))
                ->add('etat', 'choice', array(
                    'choices' => array(
                    Evenement::$ETAT_PARTANT_SI_QUOTA => 'Partant si quota',
                    Evenement::$ETAT_PARTANT => 'Partant',
                    Evenement::$ETAT_COMPLET => 'Complet',
                    Evenement::$ETAT_ANNULE => 'Annulé',
                    Evenement::$ETAT_CONFIRME => 'Confirmé',
                    ),
                    'required' => true,
                ))
                ->add('min')
                ->add('max')
                ->add('description')
                ->add('lieu', 'entity', array(
                    'class' => 'WalvaNatagoraBundle:Lieu',
                    'property' => 'ville'
                ))
            ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Walva\NatagoraBundle\Entity\Evenement'
        ));
    }

    public function getName() {
        return 'walva_natagorabundle_evenementtype';
    }

}

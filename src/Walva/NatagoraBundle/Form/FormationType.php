<?php

namespace Walva\NatagoraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use \Walva\NatagoraBundle\Entity\Formation;

class FormationType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nom')
                ->add('nomComplet')
                ->add('couleur', 'choice', array(
                    'choices' => array(
                        Formation::$COULEUR_BLEU => 'Bleu',
                        Formation::$COULEUR_GRIS => 'Gris',
                        Formation::$COULEUR_ORANGE => 'Orange',
                        Formation::$COULEUR_NOIR => 'Noir',
                        Formation::$COULEUR_ROUGE => 'Rouge',
                        Formation::$COULEUR_VERT => 'Vert',
                    ),
                    'required' => true,
                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Walva\NatagoraBundle\Entity\Formation'
        ));
    }

    public function getName() {
        return 'walva_natagorabundle_formationtype';
    }

}

<?php

namespace Walva\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Walva\NatagoraBundle\Form\EleveType;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // add your custom field
        $builder->remove('username');
        $builder->add('eleve', new EleveType(), array('label' => false));
    }
    
    public function getName()
    {
        return 'walva_user_registration';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Walva\UserBundle\Entity\User',
            'cascade_validation' => true,
        ));
    }
}



?>

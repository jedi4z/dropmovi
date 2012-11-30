<?php

namespace Dropmovi\FrontendBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProfileUserType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('file', 'file', array('label' => 'Mi foto', 'required' => false))
                ->add('name', 'text', array('label' => 'Nombre'))
                ->add('lastName', 'text', array('label' => 'Apellido'))
                ->add('location', 'text', array('label' => 'Ubicacíon', 'required' => false))
                ->add('website', 'text', array('label' => 'Sitio web', 'required' => false))
                ->add('biography', 'textarea', array('label' => 'Biografía', 'required' => false))
                ->getForm();
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Dropmovi\FrontendBundle\Entity\User',
        ));
    }

    public function getName() {
        return 'profile_user';
    }

}

?>

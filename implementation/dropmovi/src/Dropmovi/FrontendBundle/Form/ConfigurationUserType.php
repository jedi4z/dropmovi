<?php

namespace Dropmovi\FrontendBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class ConfigurationUserType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add("email", "email", array("label" => "Email"))
                ->add("username", "text", array("label" => "Nombre de usuario"))
                ->add("password", "password", array("label" => "Contraseña", "required" => false))
                ->getForm();
    }
    
    public function getName() {
        return "configuration_user";
    }
}

?>

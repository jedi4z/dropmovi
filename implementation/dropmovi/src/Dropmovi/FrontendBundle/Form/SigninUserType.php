<?php

namespace Dropmovi\FrontendBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class SigninUserType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add("name", "text", array("label" => "Nombre"))
                ->add("lastName", "text", array("label" => "Apellidpo"))
                ->add("username", "text", array("label" => "Usuario"))
                ->add("password", "password", array("label" => "Contraseña"))
                ->add("email", "text", array("label" => "Email"))
                ->getForm();
    }

    public function getName() {
        return "signin_user";
    }

}

?>

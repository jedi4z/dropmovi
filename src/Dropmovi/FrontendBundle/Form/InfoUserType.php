<?php

namespace Dropmovi\FrontendBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class InfoUserType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add("file", "file", array("label" => "Mi foto", "required" => false))
                ->add("name", "text", array("label" => "Nombre"))
                ->add("lastName", "text", array("label" => "Apellido"))
                ->add("location", "text", array("label" => "Ubicacíon"))
                ->add("website", "text", array("label" => "Sitio web"))
                ->add("biography", "textarea", array("label" => "Biografía"))
                ->getForm();
    }
    
    public function getName() {
        return "info_user";
    }
}

?>

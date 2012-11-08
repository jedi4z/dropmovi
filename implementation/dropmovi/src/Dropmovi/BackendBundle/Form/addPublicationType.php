<?php

namespace Dropmovi\BackendBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class addPublicationType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add("file", "file")
                ->add("title", "text")
                ->add("category", "entity", array("class" => "DropmoviBackendBundle:Category", "property" => "name"))
                ->add("content", "textarea")
                ->add("tags", "textarea")
                ->getForm();
    }
    
    public function getName() {
        return "add_publication";
    }
}

?>

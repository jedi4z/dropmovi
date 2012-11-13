<?php

namespace Dropmovi\BackendBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class addPublicationType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add("file", "file")
                ->add("title", "text")                
                ->add("content", "textarea", array("attr" => array("class" => "tinymce", "data-theme" => "simple")))
                ->add("category", "entity", array("class" => "DropmoviBackendBundle:Category", "property" => "name", "attr" => array("multiple" => "multiple")))
                //->add("tags", "text")
                ->add('tags', "text", array('property_path' => false))
                ->getForm();
    }

    public function getName() {
        return "add_publication";
    }

}

?>

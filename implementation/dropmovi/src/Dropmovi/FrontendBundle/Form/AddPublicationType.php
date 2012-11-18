<?php

namespace Dropmovi\FrontendBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class AddPublicationType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add("file", "file")
                ->add("title", "text")                
                ->add("content", "textarea", array("attr" => array("class" => "tinymce", "data-theme" => "simple")))
                ->add("category", "entity", array("class" => "DropmoviFrontendBundle:Category", "property" => "name", "attr" => array("multiple" => "multiple")))
                ->add("tags", "text", array("property_path" => false))
                ->getForm();
    }

    public function getName() {
        return "add_publication";
    }

}

?>

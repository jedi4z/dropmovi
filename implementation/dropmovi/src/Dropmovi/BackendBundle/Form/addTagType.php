<?php

namespace Dropmovi\BackendBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class addTagType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add("name", "text")
                ->getForm();
    }

    public function getName() {
        return "add_tag";
    }

}

?>
<?php

namespace Dropmovi\BackendBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class addCommentType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add("content", "textarea")
                ->getForm();
    }

    public function getName() {
        return "add_comment";
    }

}

?>
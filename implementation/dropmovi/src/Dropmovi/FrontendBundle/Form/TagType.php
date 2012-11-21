<?php

namespace Dropmovi\FrontendBundle\Form;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class TagType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add("name", "text")
                ->getForm();
    }

    public function getDefaultOptions(array $options){
        return array(
            'data_class' => 'Dropmovi\FrontendBundle\Entity\Tag',
        );
    }

    public function getName() {
        return 'tag';
    }

}

?>
<?php

namespace Dropmovi\FrontendBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Dropmovi\FrontendBundle\Form\TagType;
use Symfony\Component\Form\AbstractType;

class PublicationType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('file', 'file')
                ->add('title', 'text')                
                ->add('content', 'textarea', array(
                    'attr' => array(
                        'class' => 'tinymce', 
                        'data-theme' => 'simple'
                        )
                    ))
                ->add('category', 'entity', array(
                    'class' => 'DropmoviFrontendBundle:Category', 
                    'property' => 'name', 
                    'attr' => array(
                        'multiple' => 'multiple'
                        )
                    ))
                ->add('tags', 'collection', array(
                    'type' => new TagType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                ))
                ->getForm();
    }

    public function getDefaultOptions(array $options){
        return array(
            'data_class' => 'Dropmovi\FrontendBundle\Entity\Publication',
        );
    }

    public function getName() {
        return 'publication';
    }

}

?>

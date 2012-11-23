<?php

namespace Dropmovi\FrontendBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Dropmovi\FrontendBundle\Form\Type\TagType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PublicationType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('file', 'file', array('required' => false))
                ->add('title', 'text')                
                ->add('content', 'textarea', array('attr' => array('class' => 'tinymce', 'data-theme' => 'simple')))
                ->add('category', 'entity', array('class' => 'DropmoviFrontendBundle:Category', 'property' => 'name', 'attr' => array('multiple' => 'multiple')))
                ->add('tags', 'collection', array('type' => new TagType(), 'allow_add' => true, 'by_reference' => true))
                ->getForm();
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'Dropmovi\FrontendBundle\Entity\Publication',
        ));
    }

    public function getName() {
        return 'publication';
    }

}

?>

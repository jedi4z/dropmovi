<?php

namespace Dropmovi\FrontendBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PublicationType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('file', 'file', array('label' => 'Foto de portada', 'required' => false))
                ->add('title', 'text', array('label' => 'Título', 'attr' => array('class' => 'span11')))
                ->add('content', 'textarea', array('label'=> 'Contenido del Drop', 'attr' => array('class' => 'tinymce', 'data-theme' => 'medium')))
                ->add('category', 'entity', array('label' => 'Categoría', 'class' => 'DropmoviFrontendBundle:Category', 'property' => 'name', 'attr' => array('class' => 'span12', 'multiple' => 'multiple')))
                ->add('tags', 'text', array('label' => 'Etiquetas', 'attr' => array('class' => 'singleFieldTags')))
                ->getForm();
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Dropmovi\FrontendBundle\Entity\Publication',
        ));
    }

    public function getName() {
        return 'publication';
    }

}

?>

<?php 

namespace Dropmovi\FrontendBundle\Form;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class EditPublicationType extends AbstractType{	

    public function buildForm(FormBuilderInterface $builder, array $options){

		$builder->add("file", "file")
                ->add("title", "text")                
                ->add("content", "textarea", array(
                    "attr" => array("class" => "tinymce", "data-theme" => "simple")
                    ))

                ->add("category", "entity", array(
                    "class" => "DropmoviFrontendBundle:Category", 
                    "property" => "name", 
                    "attr" => array("multiple" => "multiple")
                    ))

                ->add("tags", "collection", array(
                    "type" => new TagType(),
                    "allow_add" => true,
                    "by_reference" => false,
                    "allow_delete" => true,
                    ))
                
                ->getForm();
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'Dropmovi\FrontendBundle\Entity\Publication',
        ));
    }

    public function getName(){
        return 'editPublication';
    }
}
 ?>
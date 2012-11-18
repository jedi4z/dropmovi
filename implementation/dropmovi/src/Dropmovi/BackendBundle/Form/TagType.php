<?php 

namespace Dropmovi\BackendBundle\Form;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class TagType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options){
    	$builder->add("name", "text")
    			->getForm();    
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'Dropmovi\BackendBundle\Entity\Tag',
        ));
    }

    public function getName(){
        return 'tag';
    }
}

?>
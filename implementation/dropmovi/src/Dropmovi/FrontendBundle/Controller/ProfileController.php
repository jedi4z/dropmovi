<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dropmovi\BackendBundle\Form\InfoUserType;

class ProfileController extends Controller{
    
    
    public function ProfileAction(){
        return $this->render("DropmoviFrontendBundle:Profile:profile.html.twig");
    }
    
    public function editProfileAction(){
        $user = $this->getUser();
        $form = $this->createForm(new InfoUserType(), $user);
        
        if ($this->getRequest()->getMethod() == "POST"){
            $form->bindRequest($this->getRequest());
            if($form->isValid()){
                $em = $this->getDoctrine()->getEntityManager();
                $em->getRepository("DropmoviBackendBundle:User")->updateUser($user);                
                
                return $this->redirect($this->generateUrl("dropmovi_frontend_profile"));
            }
        }
        return $this->render("DropmoviFrontendBundle:Profile:edit_profile.html.twig", array("form" =>$form->createView()));
    }
}

?>

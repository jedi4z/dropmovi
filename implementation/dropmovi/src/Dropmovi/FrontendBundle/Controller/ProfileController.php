<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dropmovi\FrontendBundle\Form\InfoUserType;

class ProfileController extends Controller{
    
    
    public function ProfileAction(){
        $em = $this->getDoctrine()->getEntityManager();
        $publications = $em->getRepository("DropmoviFrontendBundle:Publication")->getPublicationsByIdUser($this->getUser()->getId());
        return $this->render("DropmoviFrontendBundle:Profile:profile.html.twig", array("publications" => $publications));
    }
    
    public function editProfileAction(){
        $user = $this->getUser();
        $form = $this->createForm(new InfoUserType(), $user);
        
        if ($this->getRequest()->getMethod() == "POST"){
            $form->bindRequest($this->getRequest());
            if($form->isValid()){
                $em = $this->getDoctrine()->getEntityManager();
                $em->getRepository("DropmoviFrontendBundle:User")->updateUser($user);                
                
                return $this->redirect($this->generateUrl("dropmovi_frontend_profile"));
            }
        }
        return $this->render("DropmoviFrontendBundle:Profile:edit_profile.html.twig", array("form" =>$form->createView()));
    }
    
    public function publicProfileAction($username){
        $em = $this->getDoctrine()->getEntityManager();
        $user = $em->getRepository("DropmoviFrontendBundle:User")->getUserByUsername($username);        
        $publications = $em->getRepository("DropmoviFrontendBundle:Publication")->getPublicationsByIdUser($user->getId());
        
        return $this->render("DropmoviFrontendBundle:Profile:public_profile.html.twig", array ("user" => $user, "publications" => $publications));
    }
}

?>

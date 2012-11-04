<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dropmovi\BackendBundle\Form\UserType;
use Dropmovi\BackendBundle\Entity\User;

class SigninController extends Controller {
    
    public function signinAction(){
        $user = new User();
        $form = $this->createForm(new UserType(), $user);
        if ($this->getRequest()->getMethod() == "POST"){
            $form->bindRequest($this->getRequest());
            if ($form->isValid()){
                $em = $this->getDoctrine()->getEntityManager();
                $em->getRepository("DropmoviBackendBundle:User")->addUser($user);
                
                return $this->render("DropmoviFrontendBundle:Signin:signin_success.html.twig");
            }
        }
        return $this->render("DropmoviFrontendBundle:Signin:signin.html.twig", array("form" => $form->createView()));
    }
}

?>

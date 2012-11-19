<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dropmovi\FrontendBundle\Form\InfoUserType;

class ProfileController extends Controller{
    
    
    public function profileAction(){
        $em           = $this->getDoctrine()->getEntityManager();
        $publications = $this->get('publication.manager')->getPublicationsByIdUser($this->getUser()->getId());
        return $this->render('DropmoviFrontendBundle:Profile:profile.html.twig', array('publications' => $publications));
    }
    
    public function editProfileAction(){
        $user = $this->getUser();
        $form = $this->createForm(new InfoUserType(), $user);        
        if ($this->getRequest()->getMethod() == 'POST'){
            $form->bindRequest($this->getRequest());
            if($form->isValid()){
                $em = $this->getDoctrine()->getEntityManager();
                $this->get('user.manager')->editUser($user);                
                return $this->redirect($this->generateUrl('dropmovi_frontend_profile'));
            }
        }
        return $this->render('DropmoviFrontendBundle:Profile:editProfile.html.twig', array('form' =>$form->createView()));
    }
    
    public function publicProfileAction($username){
        $user         = $this->get('user.manager')->getUserByUsername($username);
        $publications = $this->get('publication.manager')->getPublicationsByIdUser($user->getId());        
        return $this->render('DropmoviFrontendBundle:Profile:publicProfile.html.twig', array ('user' => $user, 'publications' => $publications));
    }
}

?>

<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dropmovi\FrontendBundle\Form\ConfigurationUserType;

class ConfigurationController extends Controller {

    public function configurationAction() {
        $user = $this->getUser();
        $form = $this->createForm(new ConfigurationUserType(), $user);        
        if ($this->getRequest()->getMethod() == 'POST'){
            $form->bindRequest($this->getRequest());
            if ($form->isValid()){
                $em = $this->getDoctrine()->getEntityManager();
                $this->get('user.manager')->editUser($user);
                
                return $this->redirect($this->generateUrl('dropmovi_frontend_profile'));
            }            
        }
        return $this->render('DropmoviFrontendBundle:Configuration:configuration.html.twig', array('form' => $form->createView()));
    }

}
?>

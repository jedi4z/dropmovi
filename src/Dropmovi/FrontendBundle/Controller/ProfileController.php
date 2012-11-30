<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dropmovi\FrontendBundle\Form\Type\ProfileUserType;

class ProfileController extends Controller {
    
    /**
     * 
     * Show the user's profile.
     * 
     * @param type $username
     * @return type
     */
    public function profileAction($username) {
        $user = $this->get('user.manager')->getUserByUsername($username);
        $publications = $this->get('publication.manager')->getPublicationsByIdUser($user->getId());
        return $this->render('DropmoviFrontendBundle:Profile:profile.html.twig', array('user' => $user, 'publications' => $publications));
    }
    
    /**
     * 
     * Show the form for edit the user's profile.
     * 
     * @return Response
     */
    public function editProfileAction() {
        $user = $this->getUser();
        $form = $this->createForm(new ProfileUserType(), $user);
        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bindRequest($this->getRequest());
            if ($form->isValid()) {
                $this->get('user.manager')->editUser($user);
                return $this->forward('DropmoviFrontendBundle:Profile:profile', array('username' => $this->getUser()->getUsername()));
            }
        }
        return $this->render('DropmoviFrontendBundle:Profile:editProfile.html.twig', array('form' => $form->createView()));
    }

}

?>

<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SnippetsController extends Controller {

    public function listPublicationsAction($filter) {
        $publications = $this->get('publication.manager')->getPublicationFiltered($filter);
        return $this->render('DropmoviFrontendBundle:Snippets:listPublications.html.twig', array('publications' => $publications));
    }

    public function newPublicationsAction(){
    	$publications = $this->get('publication.manager')->getNewPublications();
    	return $this->render('DropmoviFrontendBundle:Snippets:newPublications.html.twig', array('publications' => $publications));
    }

    public function authorPublicationsAction($idUser, $idPublication){
    	$publications = $this->get('publication.manager')->authorPublications($idUser, $idPublication);
        return $this->render('DropmoviFrontendBundle:Snippets:authorPublications.html.twig', array('publications' => $publications));
    }

    public function newUsersAction(){
        $users = $this->get('user.manager')->newUsers();
        return $this->render('DropmoviFrontendBundle:Snippets:newUsers.html.twig', array('users' => $users));
    }
    
    public function sendInvitationAction(){
        return $this->render('DropmoviFrontendBundle:Snippets:sendInvitation.html.twig');
    }

}

?>

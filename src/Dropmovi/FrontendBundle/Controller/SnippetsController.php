<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SnippetsController extends Controller {

    public function listPublicationsAction($filter) {
        $publications = $this->get('publication.manager')->getPublicationFiltered($filter);
        return $this->render('DropmoviFrontendBundle:Snippets:listPublications.html.twig', array('publications' => $publications));
    }

    public function newsPublicaitonsAction(){
    	$publications = $this->get('publication.manager')->getNewPublications();
    	return $this->render('DropmoviFrontendBundle:Snippets:newsPublications.html.twig', array('publications' => $publications));
    }

}

?>

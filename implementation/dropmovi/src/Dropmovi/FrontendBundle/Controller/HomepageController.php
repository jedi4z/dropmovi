<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $lastPublications = $em->getRepository("DropmoviBackendBundle:Publication")->getLastPublications();
        return $this->render('DropmoviFrontendBundle:Homepage:homepage.html.twig', array ("lastPublications" => $lastPublications));
    }

}

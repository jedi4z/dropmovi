<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dropmovi\BackendBundle\Form\addPublicationType;
use Dropmovi\BackendBundle\Entity\Publication;

class PublicationController extends Controller {

    public function newPublicationAction() {
        $publication = new Publication();
        $form = $this->createForm(new addPublicationType(), $publication);
        if ($this->getRequest()->getMethod() == "POST"){
            $form->bindRequest($this->getRequest());
            if ($form->isValid()){
                $em = $this->getDoctrine()->getEntityManager();
                $user = $this->getUser();
                $em->getRepository("DropmoviBackendBundle:Publication")->addPublication($publication, $user);
            }
        }
        return $this->render("DropmoviFrontendBundle:Publication:new_publication.html.twig", array("form" => $form->createView()));
    }

}

?>
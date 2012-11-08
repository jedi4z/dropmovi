<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dropmovi\BackendBundle\Form\addPublicationType;
use Dropmovi\BackendBundle\Entity\Publication;

class SnippetsController extends Controller {

    public function formModalDropAction() {
        $publication = new Publication();
        $form = $this->createForm(new addPublicationType(), $publication);
        return $this->render("DropmoviFrontendBundle:Snippets:snpt_form_modal_drop.html.twig", array("form" => $form->createView()));
    }

    public function dropitAction() {
        $publication = new Publication();
        $form = $this->createForm(new addPublicationType(), $publication);

        if ($this->getRequest()->getMethod() == "POST") {
            $form->bindRequest($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $user = $this->getUser();
                $em->getRepository("DropmoviBackendBundle:Publication")->addPublication($publication, $user);

                return $this->redirect($this->generateUrl('dropmovi_frontend_homepage'));
            }
        }
    }

}

?>

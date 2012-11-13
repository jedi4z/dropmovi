<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dropmovi\BackendBundle\Form\addPublicationType;
use Dropmovi\BackendBundle\Entity\Publication;
use Dropmovi\BackendBundle\Form\addCommentType;
use Dropmovi\BackendBundle\Entity\Comment;

class PublicationController extends Controller {

    public function newPublicationAction() {
        $publication = new Publication();        
        $form = $this->createForm(new addPublicationType(), $publication);
        if ($this->getRequest()->getMethod() == "POST") {
            $form->bindRequest($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $user = $this->getUser();
                $textTag = $form->get("tags")->getData();  
                $em->getRepository("DropmoviBackendBundle:Publication")->addPublication($publication, $user);
                $em->getRepository("DropmoviBackendBundle:Tag")->addTag($textTag, $publication);
                
                
            }
        }
        return $this->render("DropmoviFrontendBundle:Publication:new_publication.html.twig", array("form" => $form->createView()));
    }
    
    public function removePublicationAction($id){
        $em = $this->getDoctrine()->getEntityManager();
        $em->getRepository("DropmoviBackendBundle:Publication")->removePublication($id);
        
        return $this->redirect($this->generateUrl("dropmovi_frontend_profile"));
    }

    public function viewPublicationAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $publication = $em->getRepository("DropmoviBackendBundle:Publication")->find($id);
        $comment = new Comment();
        $form = $this->createForm(new addCommentType(), $comment);

        if ($this->getRequest()->getMethod() == "POST") {
            $form->bindRequest($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();                
                $user = $this->getUser();
                $em->getRepository("DropmoviBackendBundle:Comment")->addComment($comment, $publication, $user);
            }
        }
        return $this->render("DropmoviFrontendBundle:Publication:view_publication.html.twig", array("publication" => $publication, "form" => $form->createView()));
    }

}

?>
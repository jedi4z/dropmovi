<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dropmovi\BackendBundle\Form\EditPublicationType;
use Dropmovi\BackendBundle\Form\AddPublicationType;
use Dropmovi\FrontendBundle\Event\CommentEvent;
use Dropmovi\BackendBundle\Form\AddCommentType;
use Dropmovi\BackendBundle\Entity\Publication;
use Symfony\Component\HttpFoundation\Response;
use Dropmovi\BackendBundle\Entity\Comment;

class PublicationController extends Controller {

    public function addPublicationAction() {
        $publication = new Publication();        
        $form = $this->createForm(new AddPublicationType(), $publication);
        if ($this->getRequest()->getMethod() == "POST") {
            $form->bindRequest($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $user = $this->getUser();
                $textTag = $form->get("tags")->getData();  
                $em->getRepository("DropmoviBackendBundle:Publication")->AddPublication($publication, $user);
                $em->getRepository("DropmoviBackendBundle:Tag")->addTag($textTag, $publication);
                
                
            }
        }
        return $this->render("DropmoviFrontendBundle:Publication:addPublication.html.twig", array("form" => $form->createView()));
    }
    
    public function removePublicationAction($id){
        $em = $this->getDoctrine()->getEntityManager();
        $em->getRepository("DropmoviBackendBundle:Publication")->removePublication($id);        
        return $this->redirect($this->generateUrl("dropmovi_frontend_profile"));
    }

    public function viewPublicationAction($id) {
        $em          = $this->getDoctrine()->getEntityManager();
        $comment     = new Comment();
        $form        = $this->createForm(new AddCommentType(), $comment);
        $publication = $em->getRepository("DropmoviBackendBundle:Publication")->find($id);
        
        if ($this->getRequest()->getMethod() == "POST") {
            $form->bindRequest($this->getRequest());
            if ($form->isValid()) {
                $em   = $this->getDoctrine()->getEntityManager();                
                $user = $this->getUser();
                $em->getRepository("DropmoviBackendBundle:Comment")->addComment($comment, $publication, $user);
                /**
                 * Create an array an return to view with json format.
                 */
                $commentArray = $arrayName = array(
                                                   "photoAuthor" => $comment->getAuthor()->getWebPath(),
                                                   "id"          => $comment->getId(),
                                                   "author"      => $comment->getAuthor()->getName()." ".$comment->getAuthor()->getLastName(), 
                                                   "content"     => $comment->getContent(),
                                                   "date"        => $comment->getDateOfCreate()->format("M d, Y - H:m:s"),
                                                   );
                return new Response(json_encode($commentArray));
            }
        }
        // Count a visit
        $em->getRepository("DropmoviBackendBundle:Publication")->visitCount($publication);
        return $this->render("DropmoviFrontendBundle:Publication:viewPublication.html.twig", array("publication" => $publication, "form" => $form->createView()));
    }

    public function editPublicationAction($id){
        $em          = $this->getDoctrine()->getEntityManager();
        $publication = $em->getRepository("DropmoviBackendBundle:Publication")->find($id);
        $form        = $this->createForm(new EditPublicationType(), $publication);

        return $this->render('DropmoviFrontendBundle:Publication:editPublication.html.twig', array("form" => $form->createView()));
    }

}

?>
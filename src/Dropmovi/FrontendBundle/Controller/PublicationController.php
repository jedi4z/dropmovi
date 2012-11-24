<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dropmovi\FrontendBundle\Form\Type\PublicationType;
use Dropmovi\FrontendBundle\Form\Type\CommentType;
use Dropmovi\FrontendBundle\Entity\Publication;
use Symfony\Component\HttpFoundation\Response;
use Dropmovi\FrontendBundle\Entity\Comment;

class PublicationController extends Controller {
    
    /**
     * 
     * Add a new publication.
     * 
     * @return Response
     */
    public function addPublicationAction() {
        $publication = new Publication();
        $form = $this->createForm(new PublicationType(), $publication);
        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bindRequest($this->getRequest());
            if ($form->isValid()) {
                $user = $this->getUser();
                $this->get('publication.manager')->addPublication($publication, $user);
            }
        }
        return $this->render('DropmoviFrontendBundle:Publication:addPublication.html.twig', array('form' => $form->createView()));
    }
    
    /**
     * 
     * Remove a publication by id.
     * 
     * @param integer $id
     * @return Response
     */
    public function removePublicationAction($id) {
        $this->get('publication.manager')->removePublication($id);
        return $this->redirect($this->generateUrl('dropmovi_frontend_profile'));
    }

    /**
     * 
     * Edit a publication by id.
     * 
     * @param integer $id
     * @return Response
     */
    public function editPublicationAction($id) {
        $publication = $this->get('publication.manager')->getPublicationById($id);
        $form = $this->createForm(new PublicationType(), $publication);
        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bindRequest($this->getRequest());
            if ($form->isValid()) {
                $this->get('publication.manager')->editPublication($publication);
            }
        }
        return $this->render('DropmoviFrontendBundle:Publication:editPublication.html.twig', array('form' => $form->createView()));
    }
    
    /**
     * 
     * Render a publication by id and
     * add comments.
     * 
     * @param integer $id
     * @return Response
     */
    public function viewPublicationAction($id) {
        $comment = new Comment();
        $form = $this->createForm(new CommentType(), $comment);
        $publication = $this->get('publication.manager')->getPublicationById($id);
        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bindRequest($this->getRequest());
            if ($form->isValid()) {
                $user = $this->getUser();
                $commentArray = $this->get('comment.manager')->addComment($comment, $publication, $user);
                return new Response(json_encode($commentArray));
            }
        }
        // Count a visit
        $this->get('publication.manager')->visitCount($publication);
        return $this->render('DropmoviFrontendBundle:Publication:viewPublication.html.twig', array('publication' => $publication, 'form' => $form->createView()));
    }
    
    public function listPublicationByTagAction($tag){
        $publications = $this->get('publication.manager')->listPublicationByTag($tag);
        return $this->render('DropmoviFrontendBundle:Publication:listPublicationByTag.html.twig', array('publications' => $publications));
    }
}

?>
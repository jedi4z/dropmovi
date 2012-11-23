<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dropmovi\FrontendBundle\Form\Type\PublicationType;
use Dropmovi\FrontendBundle\Form\Type\CommentType;
use Dropmovi\FrontendBundle\Entity\Publication;
use Symfony\Component\HttpFoundation\Response;
use Dropmovi\FrontendBundle\Entity\Comment;
use Dropmovi\FrontendBundle\Entity\Tag;

class PublicationController extends Controller {

    public function addPublicationAction() {
        $publication = new Publication();
        $publication->getTags()->add(new Tag());
        $form = $this->createForm(new PublicationType(), $publication);
        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bindRequest($this->getRequest());
            if ($form->isValid()) {
                $user = $this->getUser();
                $arrayTags = $form->get('tags')->getData();
                $this->get('publication.manager')->addPublication($publication, $user);
                $this->get('tag.manager')->addTag($arrayTags, $publication);
            }
        }
        return $this->render('DropmoviFrontendBundle:Publication:addPublication.html.twig', array('form' => $form->createView()));
    }

    public function removePublicationAction($id) {
        $this->get('publication.manager')->removePublication($id);
        return $this->redirect($this->generateUrl('dropmovi_frontend_profile'));
    }


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
}

?>
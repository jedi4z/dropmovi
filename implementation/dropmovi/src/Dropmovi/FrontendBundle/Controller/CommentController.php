<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommentController extends Controller {

    public function removeCommentAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $em->getRepository("DropmoviBackendBundle:Comment")->removeComment($id);
        
        return $this->redirect($this->generateUrl("dropmovi_frontend_homepage"));
    }

}

?>

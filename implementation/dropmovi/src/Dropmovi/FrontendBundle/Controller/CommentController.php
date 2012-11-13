<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller {

    public function removeCommentAction($id) {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $user = $this->getUser();
            $em = $this->getDoctrine()->getEntityManager();
            $em->getRepository("DropmoviBackendBundle:Comment")->removeComment($id, $user);

            return new Response("");
        }
    }

}

?>

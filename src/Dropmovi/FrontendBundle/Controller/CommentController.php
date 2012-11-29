<?php

namespace Dropmovi\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller {
    
    /**
     * 
     * Remove a comment.
     * 
     * @param type $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function removeCommentAction($id) {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $user = $this->getUser();
            $this->get('comment.manager')->removeComment($id, $user);
            return new Response('Se elimino tu comentario');
        }
    }

}

?>

<?php

namespace Dropmovi\FrontendBundle\Service;

use Doctrine\ORM\EntityManager;

class CommentManager {

    private $em;

    function __construct(EntityManager $EntityManager) {
        $this->em = $EntityManager;
    }

    public function addComment($comment, $publication, $user) {
        $comment->setPublication($publication);
        $comment->setAuthor($user);
        $this->em->persist($comment);
        $this->em->flush();
    }

    public function removeComment($id, $user) {
        $comment = $this->em->find("DropmoviFrontendBundle:Comment", $id);
        if ($user->getId() == $comment->getAuthor()->getId()) {
            $this->em->remove($comment);
            $this->em->flush();
        }
    }

}

?>
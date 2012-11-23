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
        $commentArray = $arrayName = array(
            'photoAuthor' => $comment->getAuthor()->getWebPath(),
            'id' => $comment->getId(),
            'author' => $comment->getAuthor()->getName() . ' ' . $comment->getAuthor()->getLastName(),
            'content' => $comment->getContent(),
            'date' => $comment->getDateOfCreate()->format('M d, Y - H:m:s'),
        );
        return $commentArray;
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
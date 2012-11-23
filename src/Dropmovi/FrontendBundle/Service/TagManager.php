<?php

namespace Dropmovi\FrontendBundle\Service;

use Dropmovi\FrontendBundle\Entity\Tag;
use Doctrine\ORM\EntityManager;

class TagManager {

    private $em;

   function __construct(EntityManager $EntityManager) {
        $this->em = $EntityManager;
    }

    public function addTag($arrayTags, $publication) {
        foreach ($arrayTags as $tag) {
            $tag->setPublication($publication);
            $this->em->persist($tag);
            $this->em->flush();
        }
    }

    /*
    $arrayTag = explode(", ", $stringTag);
        foreach ($arrayTag as $tagName) {
            $objectTag = new Tag();
            $objectTag->setName($tagName);
            $this->em->persist($objectTag);
            $this->em->flush();
        }

    */

}

?>
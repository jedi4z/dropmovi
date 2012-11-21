<?php

namespace Dropmovi\FrontendBundle\Service;

use Dropmovi\FrontendBundle\Entity\Tag;
use Doctrine\ORM\EntityManager;

class TagManager {

    private $em;

   function __construct(EntityManager $EntityManager) {
        $this->em = $EntityManager;
    }

    public function addTag($stringTag) {
        $arrayTag = explode(", ", $stringTag);
        foreach ($arrayTag as $tagName) {
            $objectTag = new Tag();
            $objectTag->setName($tagName);
            $this->em->persist($objectTag);
            $this->em->flush();
        }
    }

}

?>
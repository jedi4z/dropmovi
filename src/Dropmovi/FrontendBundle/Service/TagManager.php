<?php

namespace Dropmovi\FrontendBundle\Service;

use Doctrine\ORM\EntityManager;
use Dropmovi\FrontendBundle\Entity\Tag;

class TagManager {

    private $em;

    function __construct(EntityManager $entityManager) {
        $this->em = $entityManager;
    }
    
    /**
     * 
     * Add news tags in a publication.
     * 
     * @param String $stringTags
     * @param Publication $publication
     */
    public function addTags($stringTags, $publication) {
        $arrayTags = explode(" ", $stringTags);
        foreach ($arrayTags as $tagName){
            $tag = new Tag($tagName, $publication);
            $this->em->persist($tag);
            $this->em->flush();
        }
    }
    
    public function getTagsByIdPublication($id){
        $tags = $this->em->createQuery('SELECT t FROM DropmoviFrontendBundle:Tags t JOIN t.publication p WHERE p.id = ?1')
                         ->setParameter(1, $id)
                         ->getResult();
        return $tags;
    }

}

?>

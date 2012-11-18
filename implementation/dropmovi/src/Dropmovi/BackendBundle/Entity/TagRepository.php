<?php

namespace Dropmovi\BackendBundle\Entity;

use Dropmovi\BackendBundle\Entity\Tag;
use Doctrine\ORM\EntityRepository;

/**
 * TagRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TagRepository extends EntityRepository {

    public function addTag($textTag, $publication) {
        $em = $this->getEntityManager();
        $aTag = explode(", ", $textTag);
        foreach ($aTag as $tag) {
            $objTag = new Tag($tag, $publication);
            $em->persist($objTag);
            $em->flush();
        }
    }

}

?>

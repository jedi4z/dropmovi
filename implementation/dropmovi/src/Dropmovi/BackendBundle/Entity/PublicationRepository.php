<?php

namespace Dropmovi\BackendBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PublicationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PublicationRepository extends EntityRepository {

    public function addPublication($publication, $user) {
        $em = $this->getEntityManager();
        $publication->setAuthor($user);
        $em->persist($publication);
        $em->flush();
    }
    
    public function removePublication($id){
        $em = $this->getEntityManager();
        $publication = $em->find("DropmoviBackendBundle:Publication", $id);
        $em->remove($publication);
        $em->flush();
    }

    public function getPublicationsByIdUser($id) {
        $em = $this->getEntityManager();
        $publications = $em->createQuery("SELECT p FROM DropmoviBackendBundle:Publication p JOIN p.author a WHERE a.id = ?1 ORDER BY p.id DESC")
                            ->setParameter(1, $id)
                            ->getResult();
        return $publications;
    }
    
    public function getLastPublications(){
        $em = $this->getEntityManager();
        $publications = $em->createQuery("SELECT p FROM DropmoviBackendBundle:Publication p ORDER BY p.id DESC")
                           ->setMaxResults(24)
                           ->getResult();
        return $publications;
    }
    
    public function getPopularPublications(){
        $em = $this->getEntityManager();
        $publications = $em->createQuery("SELECT p FROM DropmoviBackendBundle:Publication p ORDER BY p.visits DESC")
                           ->setMaxResults(10)
                           ->getResult();
        return $publications;
    }
    
    public function getAllPublications(){
        $em = $this->getEntityManager();
        $publications = $em->createQuery("SELECT p FROM DropmoviBackendBundle:Publication p ORDER BY p.id DESC")
                           ->getResult();
        return $publications;
    }

    public function visitCount($publication){
        $em = $this->getEntityManager();
        $count = $publication->visitCount();
        $em->flush();
    }

}

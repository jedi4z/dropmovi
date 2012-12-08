<?php

namespace Dropmovi\FrontendBundle\Service;

use Doctrine\ORM\EntityManager;

class PublicationManager {

    private $em;

    function __construct(EntityManager $EntityManager) {
        $this->em = $EntityManager;
    }
    
    /**
     * 
     * Add a new publication.
     * 
     * @param type $publication
     * @param type $user
     */
    public function addPublication($publication, $user) {
        $publication->setAuthor($user);
        $this->em->persist($publication);
        $this->em->flush();
    }
    
    /**
     * 
     * Edit a publication.
     * 
     * @param type $publication
     */
    public function editPublication($publication) {
        if ($publication->getFile() != null) { // if a new file, delete the old,
            $publication->removeUpload();
        }
        //$publication->preUpload(); // Generate the new name for the file.
        $this->em->flush();
    }
    
    /**
     * 
     * Remove a publication.
     * 
     * @param type $id
     */
    public function removePublication($id) {
        $publication = $this->em->find('DropmoviFrontendBundle:Publication', $id);
        $this->em->remove($publication);
        $this->em->flush();
    }
    
    /**
     * 
     * Get publication by id.
     * 
     * @param type $id
     * @return type
     */
    public function getPublicationById($id) {
        $publication = $this->em->find('DropmoviFrontendBundle:Publication', $id);
        return $publication;
    }
    
    /**
     * 
     * Get publications by id the user
     * 
     * @param type $id
     * @return type
     */
    public function getPublicationsByIdUser($id) {
        $publications = $this->em->createQuery('SELECT p FROM DropmoviFrontendBundle:Publication p JOIN p.author a WHERE a.id = ?1 ORDER BY p.id DESC')
                ->setParameter(1, $id)
                ->getResult();
        return $publications;
    }
    
    /**
     * 
     * Increment of visit's counter.
     * 
     * @param type $publication
     */
    public function visitCount($publication) {
        $publication->visitCount();
        $this->em->flush();
    }

    public function getPublicationFiltered($filter) {
        switch ($filter) {
            case 'recents':
                $publications = $this->em->createQuery("SELECT p FROM DropmoviFrontendBundle:Publication p ORDER BY p.id DESC")
                        ->setMaxResults(24)
                        ->getResult();
                break;
            case 'popular':
                $publications = $this->em->createQuery("SELECT p FROM DropmoviFrontendBundle:Publication p ORDER BY p.visits DESC")
                        ->setMaxResults(24)
                        ->getResult();
                break;
            default:
                $publications = $this->em->createQuery("SELECT p FROM DropmoviFrontendBundle:Publication p ORDER BY p.id DESC")
                        ->getResult();
        }
        return $publications;
    }

    public function getNewPublications() {
        $publications = $this->em->createQuery('SELECT p FROM DropmoviFrontendBundle:Publication p ORDER BY p.id DESC')
                ->setMaxResults(3)
                ->getResult();
        return $publications;
    }

    public function listPublicationByTag($tag) {
        $publications = $this->em->createQuery("SELECT p FROM DropmoviFrontendBundle:Publication p WHERE p.tags LIKE '%" . $tag . "%'")->getResult();
        return $publications;
    }

    public function authorPublications($idUser, $idPublication) {
        $publications = $this->em->createQuery('SELECT p FROM DropmoviFrontendBundle:Publication p JOIN p.author a WHERE a.id = ?1 AND p.id != ?2')
                ->setParameter(1, $idUser)
                ->setParameter(2, $idPublication)
                ->setMaxResults(3)
                ->getResult();
        return $publications;
    }

    public function searchPublication($tag) {
        $publications = $this->em->createQuery("SELECT p FROM DropmoviFrontendBundle:Publication p WHERE p.tags LIKE '%" . $tag . "%'")->getResult();
        if (empty($publications)) {
            $publications = $this->em->createQuery("SELECT p FROM DropmoviFrontendBundle:Publication p WHERE p.title LIKE '%" . $tag . "%'")->getResult();
        }
        return $publications;
    }

}

?>
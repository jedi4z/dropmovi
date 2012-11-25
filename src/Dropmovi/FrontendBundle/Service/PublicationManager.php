<?php

namespace Dropmovi\FrontendBundle\Service;

use Doctrine\ORM\EntityManager;

class PublicationManager {

    private $em;

    function __construct(EntityManager $EntityManager) {
        $this->em = $EntityManager;
    }

    public function addPublication($publication, $user) {
        $publication->setAuthor($user);
        $this->em->persist($publication);
        $this->em->flush();
    }

    public function editPublication($publication) {
        if ($publication->getFile() != null) { // if a new file, delete the old,
            $publication->removeUpload();
        }
        $publication->preUpload(); // Generate the new name for the file.
        $this->em->flush();
    }

    public function removePublication($id) {
        $publication = $this->em->find('DropmoviFrontendBundle:Publication', $id);
        $this->em->remove($publication);
        $this->em->flush();
    }

    /*
      public function verifyIfExistTag($publication){
      $tags    = $publication->getTags();
      $allTags = $this->em->createQuery('SELECT t FROM DropmoviFrontendBundle:Tag t')->getResult();
      foreach ($tags as $tagPb) {
      foreach ($allTags as $tagDb) {
      if ($tagPb->getName() == $tagDb->getName()) {
      $publication->getTags()->removeElement($tagPb);
      $publication->getTags()->add($tagDb);
      }
      }
      }
      }
     */

    public function getPublicationById($id) {
        $publication = $this->em->find('DropmoviFrontendBundle:Publication', $id);
        return $publication;
    }

    public function getPublicationsByIdUser($id) {
        $publications = $this->em->createQuery('SELECT p FROM DropmoviFrontendBundle:Publication p JOIN p.author a WHERE a.id = ?1 ORDER BY p.id DESC')
                ->setParameter(1, $id)
                ->getResult();
        return $publications;
    }

    public function visitCount($publication) {
        $count = $publication->visitCount();
        $this->em->flush();
    }

    public function getPublicationFiltered($filter) {
        switch ($filter) {
            case 'recents':
                $publications = $this->em->createQuery("SELECT p FROM DropmoviFrontendBundle:Publication p ORDER BY p.id DESC")
                        ->setMaxResults(12)
                        ->getResult();
                break;
            case 'popular':
                $publications = $this->em->createQuery("SELECT p FROM DropmoviFrontendBundle:Publication p ORDER BY p.visits DESC")
                        ->setMaxResults(12)
                        ->getResult();
                break;
            case 'all':
                $publications = $this->em->createQuery("SELECT p FROM DropmoviFrontendBundle:Publication p ORDER BY p.id DESC")
                        ->getResult();
                break;
            default:
                $publications = $this->em->createQuery("SELECT p FROM DropmoviFrontendBundle:Publication p ORDER BY p.id DESC")
                        ->getResult();
        }
        return $publications;
    }

    public function getNewPublications() {
        $publications = $this->em->createQuery('SELECT p FROM DropmoviFrontendBundle:Publication p')
                ->setMaxResults(3)
                ->getResult();
        return $publications;
    }

    public function listPublicationByTag($tag) {
        $publications = $this->em->createQuery('SELECT p FROM DropmoviFrontendBundle:Publication p JOIN p.tags t WHERE t.name = ?1')
                ->setParameter(1, $tag)
                ->getResult();
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

        $publications = $this->em->createQuery("SELECT p FROM DropmoviFrontendBundle:Publication p JOIN p.tags t WHERE t.name LIKE '%" . $tag . "%'")->getResult();

        if (empty($publications)) {
            $publications = $this->em->createQuery("SELECT p FROM DropmoviFrontendBundle:Publication p WHERE p.title LIKE '%" . $tag . "%'")->getResult();
        }
        
        return $publications;
    }

}

?>
<?php

namespace Dropmovi\BackendBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository {

    public function addUser($user) {
        $em = $this->getEntityManager();
        $em->persist($user);
        $em->flush();
    }

    public function updateUser($user) {
        $em = $this->getEntityManager();
        
        // if a new file, delete the old,
        if ($user->getFile() != null) {
            $user->removeUpload();
        }
        // Generate the new name for the file.
        $user->preUpload();
        $em->flush();
    }

}

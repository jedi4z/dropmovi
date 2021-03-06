<?php

namespace Dropmovi\FrontendBundle\Service;

use Doctrine\ORM\EntityManager;

class UserManager {

    private $em;

    function __construct(EntityManager $EntityManager) {
        $this->em = $EntityManager;
    }

    public function addUser($user) {
        $passEncoder = md5($user->getPassword());
        $user->setPassword($passEncoder);
        $user->setPathDefault();
        $this->em->persist($user);
        $this->em->flush();
    }

    public function editUser($user) {
        $passEncoder = md5($user->getPassword());
        $user->setPassword($passEncoder);
        $this->em->flush();
    }
    
    public function editProfile($user) {
        if ($user->getFile() != null) { // if a new file, delete the old,
            $user->removeUpload();
        }
        $user->preUpload(); // Generate the new name for the file.
        $this->em->flush();
    }

    public function getUserByUsername($username) {
        $user = $this->em->createQuery('SELECT u FROM DropmoviFrontendBundle:User u WHERE u.username = ?1')
                ->setParameter(1, $username)
                ->setMaxResults(1)
                ->getResult();
        return $user[0];
    }

    public function newUsers(){
        $users = $this->em->createQuery('SELECT u FROM DropmoviFrontendBundle:User u ORDER BY u.id DESC')
                 ->getResult();
        return $users;
    }

}

?>
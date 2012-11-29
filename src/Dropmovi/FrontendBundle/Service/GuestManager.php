<?php

namespace Dropmovi\FrontendBundle\Service;

use Doctrine\ORM\EntityManager;

class GuestManager {

    private $em;

    function __construct(EntityManager $EntityManager) {
        $this->em = $EntityManager;
    }
    
    public function addGuest($guest, $user){
        $guest->setInviting($user);
        $this->em->persist($guest);
        $this->em->flush();
    }

}

?>

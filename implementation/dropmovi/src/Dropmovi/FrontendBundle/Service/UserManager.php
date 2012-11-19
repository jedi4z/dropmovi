<?php 

namespace Dropmovi\FrontendBundle\Service;

use Doctrine\ORM\EntityManager;
use Dropmovi\FrontendBundle\Service\PublicationManager;

class UserManager{
	
	private $em;
	private $pm;

	function __construct(EntityManager $EntityManager, PublicationManager $publicationManager){
		$this->em = $EntityManager;
		$this->pm = $publicationManager;
	}

    public function addUser($user) {
        $this->em->persist($user);
        $this->em->flush();
    }

    public function editUser($user){        
        if ($user->getFile() != null) { // if a new file, delete the old,
            $user->removeUpload();
        }
        $user->preUpload(); // Generate the new name for the file.
        $this->em->flush();
    }

    public function getUserByUsername($username){
        $user = $this->em->createQuery('SELECT u FROM DropmoviFrontendBundle:User u WHERE u.username = ?1')
		                 ->setParameter(1, $username)
		                 ->setMaxResults(1)
		                 ->getResult();
        return $user[0];
    }
}
?>
<?php

namespace Dropmovi\FrontendBundle\Entity;

use \DateTime;
use \DateTimeZone;
use Doctrine\ORM\Mapping as ORM;

/**
 * Invitation
 *
 * @ORM\Table(name="invitations")
 * @ORM\Entity
 */
class Invitation {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="inviting", type="string", length=255)
     */
    private $inviting;

    /**
     * @var string
     *
     * @ORM\Column(name="guest", type="string", length=255)
     */
    private $guest;

    /**
     * @var \DateTime $dateOfCreate
     *
     * @ORM\Column(name="date_of_create", type="datetime")
     */
    private $dateOfCreate;

    public function getId() {
        return $this->id;
    }

    public function setInviting($inviting) {
        $this->inviting = $inviting;
    }

    public function getInviting() {
        return $this->inviting;
    }

    public function setGuest($guest) {
        $this->guest = $guest;
    }

    public function getGuest() {
        return $this->guest;
    }

    public function setDateOfCreate($dateOfCreate) {
        $this->dateOfCreate = $dateOfCreate;
    }

    public function getDateOfCreate() {
        return $this->dateOfCreate;
    }

}

<?php

namespace Dropmovi\FrontendBundle\Entity;

use \DateTime;
use \DateTimeZone;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Invitation
 *
 * @ORM\Table(name="guests")
 * @ORM\Entity
 */
class Guest {

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
    private $email;

    /**
     * @var \DateTime $dateOfCreate
     *
     * @ORM\Column(name="date_of_create", type="datetime")
     */
    private $dateOfCreate;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="guests", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * */
    private $inviting;

    // ==================================================================
    //
    // Constructor
    //
    // ------------------------------------------------------------------

    function __construct($inviting = null, $email = '') {
        $this->dateOfCreate = new DateTime('now', new DateTimeZone('America/Argentina/Cordoba'));
        $this->inviting = $inviting;
        $this->email = $email;
    }

    // ==================================================================
    //
    // Getters & Setters
    //
    // ------------------------------------------------------------------
    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getDateOfCreate() {
        return $this->dateOfCreate;
    }

    public function setDateOfCreate($dateOfCreate) {
        $this->dateOfCreate = $dateOfCreate;
    }

    public function getInviting() {
        return $this->inviting;
    }

    public function setInviting($inviting) {
        $this->inviting = $inviting;
    }

}

<?php

namespace Dropmovi\FrontendBundle\Entity;

use \DateTime;
use \DateTimeZone;
use Doctrine\ORM\Mapping as ORM;

/**
 * Feeddback
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Feeddback {

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
     * @ORM\Column(name="user", type="string", length=255)
     */
    private $user;

    /**
     * @var \DateTime $dateOfCreate
     *
     * @ORM\Column(name="date_of_create", type="datetime")
     */
    private $dateOfCreate;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    public function getId() {
        return $this->id;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function getUser() {
        return $this->user;
    }

    public function setDateOfCreate($dateOfCreate) {
        $this->dateOfCreate = $dateOfCreate;
    }

    public function getDateOfCreate() {
        return $this->dateOfCreate;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function getUrl() {
        return $this->url;
    }

}

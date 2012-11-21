<?php

namespace Dropmovi\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \DateTimeZone;
use \DateTime;

/**
 * Dropmovi\FrontendBundle\Entity\Tag
 *
 * @ORM\Table(name="tags")
 * @ORM\Entity(repositoryClass="Dropmovi\FrontendBundle\Entity\TagRepository")
 */
class Tag {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

     /**
     * @var \DateTime $dateOfCreate
     *
     * @ORM\Column(name="dateOfCreate", type="datetime")
     */
    private $dateOfCreate;

    function __construct($name = "") {
        $this->name = $name;
        $this->dateOfCreate = new DateTime('now', new DateTimeZone('America/Argentina/Cordoba'));
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPublication() {
        return $this->publication;
    }

    public function setPublication($publication) {
        $this->publication = $publication;
    }

    public function getDateOfCreate() {
        return $this->dateOfCreate;
    }

    public function setDateOfCreate($dateOfCreate) {
        $this->dateOfCreate = $dateOfCreate;
    }

}

?>

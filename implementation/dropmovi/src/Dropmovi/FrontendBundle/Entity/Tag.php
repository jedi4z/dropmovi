<?php

namespace Dropmovi\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\ManyToOne(targetEntity="Publication", inversedBy="tags", cascade={"all"})
     * @ORM\JoinColumn(name="publication_id", referencedColumnName="id")
     */
    private $publication;

    function __construct($name = "", $publication = null) {
        $this->name = $name;
        $this->publication = $publication;
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

}

?>

<?php

namespace Dropmovi\FrontendBundle\Entity;

use \DateTime;
use \DateTimeZone;
use Doctrine\ORM\Mapping as ORM;

/**
 * Dropmovi\FrontendBundle\Entity\Comment
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity(repositoryClass="Dropmovi\FrontendBundle\Entity\CommentRepository")
 */
class Comment {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $content
     *
     * @ORM\Column(name="content", type="string", length=5000)
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="comments")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity="Publication", inversedBy="comments")
     * @ORM\JoinColumn(name="publication_id", referencedColumnName="id")
     */
    private $publication;

    /**
     * @var \DateTime $dateOfCreate
     *
     * @ORM\Column(name="date_of_create", type="datetime")
     */
    private $dateOfCreate;

    /*
     * ================================================================================================
     *   Constructor
     * ================================================================================================
     */

    function __construct($content = "", $author = null, $publication = null) {
        $this->content = $content;
        $this->author = $author;
        $this->author = $publication;
        $this->dateOfCreate = new DateTime('now', new DateTimeZone('America/Argentina/Cordoba'));
    }

    public function getId() {
        return $this->id;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

    public function getContent() {
        return $this->content;
    }

    public function setAuthor($author) {
        $this->author = $author;
        return $this;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setDateOfCreate($dateOfCreate) {
        $this->dateOfCreate = $dateOfCreate;
        return $this;
    }

    public function getDateOfCreate() {
        return $this->dateOfCreate;
    }

    public function getPublication() {
        return $this->publication;
    }

    public function setPublication($publication) {
        $this->publication = $publication;
    }

}

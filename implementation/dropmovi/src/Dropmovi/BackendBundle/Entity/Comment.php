<?php

namespace Dropmovi\BackendBundle\Entity;

use \DateTime;
use \DateTimeZone;
use Doctrine\ORM\Mapping as ORM;

/**
 * Dropmovi\BackendBundle\Entity\Comment
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity(repositoryClass="Dropmovi\BackendBundle\Entity\CommentRepository")
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
     * @var \DateTime $dateOfCreate
     *
     * @ORM\Column(name="dateOfCreate", type="datetime")
     */
    private $dateOfCreate;

    /*
     * ================================================================================================
     *   Constructor
     * ================================================================================================
     */

    function __construct($content = "", $author = null) {
        $this->content = $content;
        $this->author = $author;
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

}

<?php

namespace Dropmovi\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dropmovi\BackendBundle\Entity\Comment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Dropmovi\BackendBundle\Entity\CommentRepository")
 */
class Comment
{
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
     * @var \DateTime $dateOfCreate
     *
     * @ORM\Column(name="dateOfCreate", type="datetime")
     */
    private $dateOfCreate;

    /**
     * @var string $author
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set dateOfCreate
     *
     * @param \DateTime $dateOfCreate
     * @return Comment
     */
    public function setDateOfCreate($dateOfCreate)
    {
        $this->dateOfCreate = $dateOfCreate;
    
        return $this;
    }

    /**
     * Get dateOfCreate
     *
     * @return \DateTime 
     */
    public function getDateOfCreate()
    {
        return $this->dateOfCreate;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Comment
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }
}

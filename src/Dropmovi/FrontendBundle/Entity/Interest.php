<?php

namespace Dropmovi\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Interest
 *
 * @ORM\Table(name="interests")
 * @ORM\Entity(repositoryClass="Dropmovi\FrontendBundle\Entity\InterestRepository")
 */
class Interest
{
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    // ==================================================================
    //
    // Getters & Setters
    //
    // ------------------------------------------------------------------
    

    public function getId(){
        return $this->id;
    }

    public function setName($name){
        $this->name = $name;    
        return $this;
    }

    public function getName(){
        return $this->name;
    }
}

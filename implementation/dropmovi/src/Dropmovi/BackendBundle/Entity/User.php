<?php

namespace Dropmovi\BackendBundle\Entity;

use \DateTime;
use \DateTimeZone;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Dropmovi\BackendBundle\Entity\User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="Dropmovi\BackendBundle\Entity\UserRepository")
 */
class User implements UserInterface {

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
     * @ORM\Column(name="name", type="string", length=20)
     */
    private $name;

    /**
     * @var string $lastName
     *
     * @ORM\Column(name="lastName", type="string", length=20)
     */
    private $lastName;

    /**
     * @var string $username
     *
     * @ORM\Column(name="username", type="string", length=20, unique=true)
     */
    private $username;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=50)
     */
    private $password;

    /**
     * @var \DateTime $dateOfCreate
     *
     * @ORM\Column(name="dateOfCreate", type="datetime")
     */
    private $dateOfCreate;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=50)
     */
    private $email;

    /*
     * ================================================================================================
     *   Constructor
     * ================================================================================================
     */

    function __construct($name = "", $lastName = "", $username = "", $password = "", $email = "") {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->password = $password;
        $this->dateOfCreate = new DateTime('now', new DateTimeZone('America/Argentina/Cordoba'));
        $this->email = $email;
    }

    /*
     * ================================================================================================
     *   Getters & Setters
     * ================================================================================================
     */

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getDateOfCreate() {
        return $this->dateOfCreate;
    }

    public function setDateOfCreate($dateOfCreate) {
        $this->dateOfCreate = $dateOfCreate;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getRoles() {
        return array("ROLE_USER");
    }

    public function eraseCredentials() {
        
    }

    public function getSalt() {
        
    }

}

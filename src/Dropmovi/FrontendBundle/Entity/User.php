<?php

namespace Dropmovi\FrontendBundle\Entity;

use \DateTime;
use \DateTimeZone;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Dropmovi\FrontendBundle\Entity\User
 *
 * @ORM\Table(name="users")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Dropmovi\FrontendBundle\Entity\UserRepository")
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
     * @ORM\Column(name="email", type="string", length=50, unique=true)
     */
    private $email;

    /**
     * @var string $biography
     *
     * @ORM\Column(name="biography", type="string", length=500)
     */
    private $biography;

    /**
     * @var string $website
     *
     * @ORM\Column(name="website", type="string", length=200)
     */
    private $website;

    /**
     * @var string $location
     *
     * @ORM\Column(name="location", type="string", length=200)
     */
    private $location;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $path;
    private $file;

    /**
     * @ORM\OneToMany(targetEntity="Publication", mappedBy="author", cascade={"persist"})
     * */
    private $publications;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="author")
     * */
    private $comments;

    /*
     * ================================================================================================
     *   Constructor
     * ================================================================================================
     */

    function __construct($name = "", $lastName = "", $username = "", $password = "", $email = "", $biography = "", $website = "", $location = "") {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->password = $password;
        $this->dateOfCreate = new DateTime('now', new DateTimeZone('America/Argentina/Cordoba'));
        $this->email = $email;
        $this->biography = $biography;
        $this->website = $website;
        $this->location = $location;
        $this->publications = new ArrayCollection;
        $this->comments = new ArrayCollection();
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

    public function getBiography() {
        return $this->biography;
    }

    public function setBiography($biography) {
        $this->biography = $biography;
    }

    public function getWebsite() {
        return $this->website;
    }

    public function setWebsite($website) {
        $this->website = $website;
    }

    public function getLocation() {
        return $this->location;
    }

    public function setLocation($location) {
        $this->location = $location;
    }

    public function getPath() {
        return $this->path;
    }

    public function setPath($path) {
        $this->path = $path;
    }

    public function getFile() {
        return $this->file;
    }

    public function setFile($file) {
        $this->file = $file;
    }

    public function setPublications($publications) {
        $this->publications->add($publications);
    }

    public function getPublications() {
        return $this->publications;
    }

    public function getComments() {
        return $this->comments;
    }

    public function setComments($comments) {
        $this->comments->add($comments);
    }

    /*
     * ================================================================================================
     *   Method for the upload file
     * ================================================================================================
     */

    public function getAbsolutePath() {
        return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
    }

    public function getWebPath() {
        if (isset($this->path)) {
            return null === $this->path ? null : '/' . $this->getUploadDir() . '/' . $this->path;
        }else{
            return  '/../../../..' . '/bundles/frontend/img/dummy/default-profile.png';
        }
        
    }

    protected function getUploadRootDir() {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'bundles/frontend/img/uploads/user';
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload() {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $this->path = sha1(uniqid(mt_rand(), true)) . '.' . $this->file->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload() {
        if (null === $this->file) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error

        $this->file->move($this->getUploadRootDir(), $this->path);

        unset($this->file);
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload() {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

}

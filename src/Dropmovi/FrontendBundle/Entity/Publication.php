<?php

namespace Dropmovi\FrontendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Mapping as ORM;
use \DateTimeZone;
use \DateTime;

/**
 * Dropmovi\FrontendBundle\Entity\Publication
 *
 * @ORM\Table(name="publications")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Dropmovi\FrontendBundle\Entity\PublicationRepository")
 */
class Publication {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(name="slug", type="string", length=255)
     */
    protected $slug;

    /**
     * @ORM\ManyToOne(targetEntity="Category", cascade={"persist"})
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @var string $content
     *
     * @ORM\Column(name="content", type="string", length=10000)
     */
    private $content;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \DateTime $dateOfCreate
     *
     * @ORM\Column(name="date_of_create", type="datetime")
     */
    private $dateOfCreate;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="publications", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * */
    private $author;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", cascade={"persist"})
     * @ORM\JoinTable(name="publication_tags",
     *      joinColumns={@ORM\JoinColumn(name="publication_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")}
     *      )
     */
    private $tags;
    private $file;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $path;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="publication", cascade={"all"})
     * */
    private $comments;

    /**
     * @ORM\Column(name="visits", type="integer")
     * */
    private $visits;

    // ==================================================================
    //
    // Constructor
    //
    // ------------------------------------------------------------------


    function __construct($title = "", $slug = "", $category = null, $content = "", $description = "", $author = null, $file = null, $path = "", $visits = 0) {
        $this->title = $title;
        $this->slug = $slug;
        $this->category = $category;
        $this->content = $content;
        $this->description = $description;
        $this->dateOfCreate = new DateTime('now', new DateTimeZone('America/Argentina/Cordoba'));
        $this->author = $author;
        $this->tags = new ArrayCollection();
        $this->file = $file;
        $this->path = $path;
        $this->comments = new ArrayCollection();
        $this->visits = $visits;
    }

    // ==================================================================
    //
    // Getters & Setters
    //
    // ------------------------------------------------------------------


    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
        $this->setSlug($this->title);
    }

    public function getSlug() {
        return $this->slug;
    }

    public function setSlug($slug) {
        $this->slug = $this->slugify($slug);
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
        $this->setDescription($this->content);
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $this->generateDescription($description);
    }

    public function getDateOfCreate() {
        return $this->dateOfCreate;
    }

    public function setDateOfCreate($dateOfCreate) {
        $this->dateOfCreate = $dateOfCreate;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function getTags() {
        return $this->tags;
    }

    public function setTags(ArrayCollection $tags) {
        $this->tags = $tags;
    }

    public function getFile() {
        return $this->file;
    }

    public function setFile($file) {
        $this->file = $file;
    }

    public function getPath() {
        return $this->path;
    }

    public function setPath($path) {
        $this->path = $path;
    }

    public function getComments() {
        return $this->comments;
    }

    public function setComments($comments) {
        $this->comments->add($comments);
    }

    public function getVisits() {
        return $this->visits;
    }

    public function setVisits($visits) {
        $this->visits = $visits;
        return $this;
    }

    // ==================================================================
    //
    // Count of visits
    //
    // ------------------------------------------------------------------

    public function visitCount() {
        $this->visits = $this->getVisits() + 1;
    }

    // ==================================================================
    //
    // Getters & Setters
    //
    // ------------------------------------------------------------------


    public function slugify($text) {

        $text = preg_replace('#[^\\pL\d]+#u', '-', $text);
        $text = trim($text, '-');

        if (function_exists('iconv')) {
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        }

        $text = strtolower($text);
        $text = preg_replace('#[^-\w]+#', '', $text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    // ==================================================================
    //
    // Method for to generate the description
    //
    // ------------------------------------------------------------------


    public function generateDescription($text) {
        $text = strip_tags($text);
        $text = preg_replace('/\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|$!:,.;]*[A-Z0-9+&@#\/%=~_|$]/i', '', $text);
        return $text;
    }

    // ==================================================================
    //
    // Method for the upload file
    //
    // ------------------------------------------------------------------


    public function getAbsolutePath() {
        return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
    }

    public function getWebPath() {
        return null === $this->path ? null : '/' . $this->getUploadDir() . '/' . $this->path;
    }

    protected function getUploadRootDir() {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'bundles/frontend/img/uploads/cover-publications';
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

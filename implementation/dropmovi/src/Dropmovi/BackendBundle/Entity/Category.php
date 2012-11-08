<?php

namespace Dropmovi\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dropmovi\BackendBundle\Entity\Category
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity(repositoryClass="Dropmovi\BackendBundle\Entity\CategoryRepository")
 */
class Category {

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
     * @ORM\Column(name="slug", type="string", length=255)
     */
    protected $slug;

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
        $this->setSlug($this->title);
    }

    public function getSlug() {
        return $this->slug;
    }

    public function setSlug($slug) {
        $this->slug = $this->slugify($slug);
    }

    /*
     * ================================================================================================
     *   Method for to generate the slugify
     * ================================================================================================
     */

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

}
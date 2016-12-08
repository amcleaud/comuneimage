<?php

namespace CUI\CoupdecoeurBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Cadeau
 *
 * @ORM\Table(name="cadeau")
 * @ORM\Entity(repositoryClass="CUI\CoupdecoeurBundle\Repository\CadeauRepository")
 */
class Cadeau
{
    /**
     * @ORM\ManyToMany(targetEntity="CUI\CoupdecoeurBundle\Entity\Photo", cascade={"persist"})
     */
      private $photos;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="ordre", type="smallint")
     */
    private $ordre;

    public function __construct()
    {
      $this->photos = new ArrayCollection();
    }

    public function addPhotos(Photo $photo)
    {
    $this->photos[] = $photo;
    }

    public function addPhoto(Photo $photo)
    {
    $this->photos[] = $photo;
    }

    public function removePhotos(Photo $photo)
    {
    // Ici on utilise une méthode de l'ArrayCollection, pour supprimer la photo en argument
    $this->photos->removeElement($photo);
    }

    public function removePhoto(Photo $photo)
    {
    // Ici on utilise une méthode de l'ArrayCollection, pour supprimer la photo en argument
    $this->photos->removeElement($photo);
    }

    public function getPhotos()
    {
    return $this->photos;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Cadeau
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Cadeau
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set ordre
     *
     * @param integer $ordre
     *
     * @return Cadeau
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;

        return $this;
    }

    /**
     * Get ordre
     *
     * @return int
     */
    public function getOrdre()
    {
        return $this->ordre;
    }
}


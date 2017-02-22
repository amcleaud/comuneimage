<?php
// src/CUI/CoupdecoeurBundle/Entity/Newsletter.php

namespace CUI\CoupdecoeurBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="newsletter")
 * @ORM\Entity(repositoryClass="CUI\CoupdecoeurBundle\Repository\NewsletterRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Newsletter
{
  /**
   * @ORM\OneToMany(targetEntity="CUI\CoupdecoeurBundle\Entity\Cadeau", mappedBy="newsletter", cascade={"persist"})
   */
  private $cadeaux;
  /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(name="titre", type="string", length=255)
   */
  private $titre;

   /**
   * @ORM\Column(name="date_emailing", type="date", nullable=true)
   */
  private $dateEmailing;

  /**
   * @ORM\Column(name="description", type="text", nullable=true)
   */
  private $description;

  /**
   * @ORM\Column(name="lien_facebook", type="string", length=255, nullable=true)
   */
  private $lienFacebook;

  /**
   * @ORM\Column(name="date_creation", type="datetime")
   */
  private $dateCreation;

  /**
   * @ORM\Column(name="date_publication", type="datetime", nullable=true)
   */
  private $datePublication;

  /**
   * @ORM\Column(name="date_maj", type="datetime", nullable=true)
   */
  private $dateMAJ;

  /**
   * @ORM\Column(name="est_publie", type="boolean", nullable=true)
   */
  private $estPublie;

  /**
   * @var string
   *
   * @ORM\Column(name="lien", type="string", length=255, nullable=true)
   */
  private $lien;

  public function __construct()
  {
    $this->cadeaux = new ArrayCollection();
    $this->dateCreation = new \Datetime();
  }

  public function setCadeaux($cadeaux) {
    if(count($cadeaux)>0) {
      foreach($cadeaux as $cadeau) {
        $this->addCadeaux($cadeau);
      }
    }
    return $this;
  }

  public function addCadeaux(Cadeau $cadeau)
  {
  $cadeau->setNewsletter($this);
  $this->cadeaux[] = $cadeau;
  }

  public function removeCadeaux(Cadeau $cadeau)
  {
  $this->cadeaux->removeElement($cadeau);
  }

  public function getCadeaux()
  {
  return $this->cadeaux;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setTitre($titre)
  {
    $this->titre = $titre;
    $this->setLien($titre);

    return $this;
  }

  public function getTitre()
  {
    return $this->titre;
  }

  public function setLienFacebook($lienFacebook)
  {
    $this->lienFacebook = $lienFacebook;

    return $this;
  }

  public function getLienFacebook()
  {
    return $this->lienFacebook;
  }

  public function setDateCreation(\Datetime $dateCreation)
  {
    $this->dateCreation = $dateCreation;

    return $this;
  }

  public function getDateCreation()
  {
    return $this->dateCreation;
  }

  public function setDateEmailing(\Datetime $dateEmailing)
  {
    $this->dateEmailing = $dateEmailing;

    return $this;
  }

  public function getDateEmailing()
  {
    return $this->dateEmailing;
  }

  public function setDateMAJ(\Datetime $dateMAJ)
  {
    $this->dateMAJ = $dateMAJ;

    return $this;
  }

  public function getDateMAJ()
  {
    return $this->dateMAJ;
  }

  public function setDatePublication(\Datetime $datePublication)
  {
    $this->datePublication = $datePublication;

    return $this;
  }

  public function getDatePublication()
  {
    return $this->datePublication;
  }

  public function setEstPublie($estPublie)
  {
    $this->estPublie = $estPublie;
    if($this->estPublie == true)
      $this->setDatePublication(new \Datetime());

    return $this;
  }

  public function getEstPublie()
  {
    return $this->estPublie;
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
   * Set lien
   *
   * @param string $nom
   *
   * @return Newsletter
   */
  public function setLien($nom)
  {
      $this->lien = $this->seo_friendly_url($nom).".html";

      return $this;
  }

  /**
   * Get nom formatté pour url
   *
   * @return mixed
   */
  public function getLien()
  {
    return $this->lien;
  }

  /**
   * Convertit tous les caractères spéciaux d'une chaîne de caractère en caractères normaux et sans espaces
   *
   * @param string $string  la chaine à convertir
   *
   * @return string
   */
  function seo_friendly_url($string){
    $string = str_replace(array('[\', \']'), '', $string);
    $string = preg_replace('/\[.*\]/U', '', $string);
    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
    $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
    return strtolower(trim($string, '-'));
}

  function __toString() {
      return $this->titre;
  }
}

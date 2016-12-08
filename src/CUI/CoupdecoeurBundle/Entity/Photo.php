<?php

namespace CUI\CoupdecoeurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application\Sonata\MediaBundle\Entity\Media;

/**
 * @ORM\Table(name="photo")
 * @ORM\Entity(repositoryClass="CUI\CoupdecoeurBundle\Repository\PhotoRepository")
 */
class Photo
{

  /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"all"})
   */
  private $image;

  public function setImage(Media $image)
  {
    $this->image = $image;

    return $this;
  }

  public function getImage()
  {
    return $this->image;
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

}
<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tformation
 *
 * @ORM\Table(name="tformation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TformationRepository")
 */
class Tformation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="libformation", type="string", length=255)
     */
     private $libformation;

     /**
      * @ORM\Column(name="abrevformation", type="string", length=50)
      */
      private $abrevformation;

      /**
       * un type de formation correspond à plusieures filieres
       *
       * @ORM\OneToMany(targetEntity="AppBundle\Entity\Filiere", mappedBy="tformation")
       */
       private $tformations;

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
     * Set libformation
     *
     * @param string $libformation
     *
     * @return Tformation
     */
    public function setLibformation($libformation)
    {
        $this->libformation = $libformation;

        return $this;
    }

    /**
     * Get libformation
     *
     * @return string
     */
    public function getLibformation()
    {
        return $this->libformation;
    }

    /**
     * Set abrevformation
     *
     * @param string $abrevformation
     *
     * @return Tformation
     */
    public function setAbrevformation($abrevformation)
    {
        $this->abrevformation = $abrevformation;

        return $this;
    }

    /**
     * Get abrevformation
     *
     * @return string
     */
    public function getAbrevformation()
    {
        return $this->abrevformation;
    }
    public function __toString(){
      return $this->getAbrevformation();
    }
}

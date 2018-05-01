<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ecole
 *
 * @ORM\Table(name="ecole")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EcoleRepository")
 */
class Ecole
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
     * @var string
     *
     * @ORM\Column(name="libecole", type="string", length=255)
     */
    private $libecole;

    /**
     * @var string
     *
     * @ORM\Column(name="abrevecole", type="string", length=255)
     */
    private $abrevecole;

    /**
     * une école a plusieurs filières
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Filiere", mappedBy="ecole")
     */
     private $filieres;


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
     * Set libecole
     *
     * @param string $libecole
     *
     * @return Ecole
     */
    public function setLibecole($libecole)
    {
        $this->libecole = $libecole;

        return $this;
    }

    /**
     * Get libecole
     *
     * @return string
     */
    public function getLibecole()
    {
        return $this->libecole;
    }

    /**
     * Set abrevecole
     *
     * @param string $abrevecole
     *
     * @return Ecole
     */
    public function setAbrevecole($abrevecole)
    {
        $this->abrevecole = $abrevecole;

        return $this;
    }

    /**
     * Get abrevecole
     *
     * @return string
     */
    public function getAbrevecole()
    {
        return $this->abrevecole;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->filieres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add filiere
     *
     * @param \AppBundle\Entity\Filiere $filiere
     *
     * @return Ecole
     */
    public function addFiliere(\AppBundle\Entity\Filiere $filiere)
    {
        $this->filieres[] = $filiere;

        return $this;
    }

    /**
     * Remove filiere
     *
     * @param \AppBundle\Entity\Filiere $filiere
     */
    public function removeFiliere(\AppBundle\Entity\Filiere $filiere)
    {
        $this->filieres->removeElement($filiere);
    }

    /**
     * Get filieres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFilieres()
    {
        return $this->filieres;
    }

    public function __toString(){
      return $this->getAbrevecole();
    }
}

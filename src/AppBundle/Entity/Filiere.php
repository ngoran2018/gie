<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Ecole;

/**
 * Filiere
 *
 * @ORM\Table(name="filiere")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FiliereRepository")
 */
class Filiere
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
     * @ORM\Column(name="libfiliere", type="string", length=255, unique=true)
     */
    private $libfiliere;

    /**
     * @var string
     *
     * @ORM\Column(name="abrevfiliere", type="string", length=255, unique=true)
     */
    private $abrevfiliere;

    /**
     * Une filiere appartient à une et une seule Ecole
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ecole", inversedBy="filieres")
     * @ORM\JoinColumn(name="ecole_id", referencedColumnName="id")
     */
     private $ecole;

     /**
      * Une filiere appartient à une et un seul Domaine
      *
      * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Domaine", inversedBy="domaines")
      * @ORM\JoinColumn(name="domaine_id", referencedColumnName="id")
      */
      private $domaine;

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
     * Set libfiliere
     *
     * @param string $libfiliere
     *
     * @return Filiere
     */
    public function setLibfiliere($libfiliere)
    {
        $this->libfiliere = $libfiliere;

        return $this;
    }

    /**
     * Get libfiliere
     *
     * @return string
     */
    public function getLibfiliere()
    {
        return $this->libfiliere;
    }

    /**
     * Set abrevfiliere
     *
     * @param string $abrevfiliere
     *
     * @return Filiere
     */
    public function setAbrevfiliere($abrevfiliere)
    {
        $this->abrevfiliere = $abrevfiliere;

        return $this;
    }

    /**
     * Get abrevfiliere
     *
     * @return string
     */
    public function getAbrevfiliere()
    {
        return $this->abrevfiliere;
    }

    /**
     * Set ecole
     *
     * @param \AppBundle\Entity\Ecole $ecole
     *
     * @return Filiere
     */
    public function setEcole(\AppBundle\Entity\Ecole $ecole = null)
    {
        $this->ecole = $ecole;

        return $this;
    }

    /**
     * Get ecole
     *
     * @return \AppBundle\Entity\Ecole
     */
    public function getEcole()
    {
        return $this->ecole;
    }

    /**
     * Set domaine
     *
     * @param \AppBundle\Entity\Domaine $domaine
     *
     * @return Filiere
     */
    public function setDomaine(\AppBundle\Entity\Domaine $domaine = null)
    {
        $this->domaine = $domaine;

        return $this;
    }

    /**
     * Get domaine
     *
     * @return \AppBundle\Entity\Domaine
     */
    public function getDomaine()
    {
        return $this->domaine;
    }
}

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
       * une filière appartient à un et un seul type de formation
       *
       * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tformation", inversedBy="tformations")
       * @ORM\JoinColumn(name="tformation_id", referencedColumnName="id")
       *
       */
       private $tformation;

       /**
        * une filiere a plusieurs mentions
        *
        * @ORM\OneToMany(targetEntity="AppBundle\Entity\Mention", mappedBy="filiere")
        */
        private $mentions;

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

    /**
     * Set tformation
     *
     * @param \AppBundle\Entity\Tformation $tformation
     *
     * @return Filiere
     */
    public function setTformation(\AppBundle\Entity\Tformation $tformation = null)
    {
        $this->tformation = $tformation;

        return $this;
    }

    /**
     * Get tformation
     *
     * @return \AppBundle\Entity\Tformation
     */
    public function getTformation()
    {
        return $this->tformation;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->mentions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add mention
     *
     * @param \AppBundle\Entity\Mention $mention
     *
     * @return Filiere
     */
    public function addMention(\AppBundle\Entity\Mention $mention)
    {
        $this->mentions[] = $mention;

        return $this;
    }

    /**
     * Remove mention
     *
     * @param \AppBundle\Entity\Mention $mention
     */
    public function removeMention(\AppBundle\Entity\Mention $mention)
    {
        $this->mentions->removeElement($mention);
    }

    /**
     * Get mentions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMentions()
    {
        return $this->mentions;
    }

    public function __toString(){
      return $this->ecole .'-'. $this->libfiliere;
    }
}

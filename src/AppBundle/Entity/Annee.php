<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annee
 *
 * @ORM\Table(name="annee")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnneeRepository")
 */
class Annee
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
     * @var int
     *
     * @ORM\Column(name="debutannee", type="integer", unique=true)
     */
    private $debutannee;

    /**
     * @var int
     *
     * @ORM\Column(name="finannee", type="integer", nullable=true, unique=true)
     */
    private $finannee;

    /**
     * @var string
     *
     * @ORM\Column(name="libannee", type="string", length=255, unique=true)
     */
    private $libannee;

    /**
     * @var string
     *
     * @ORM\Column(name="libsessionexam", type="string", length=255)
     */
    private $libsessionexam;

    /**
     * @var string
     *
     * @ORM\Column(name="datecomexam", type="string", length=50)
     */
    private $datecomexam;


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
     * Set debutannee
     *
     * @param integer $debutannee
     *
     * @return Annee
     */
    public function setDebutannee($debutannee)
    {
        $this->debutannee = $debutannee;

        return $this;
    }

    /**
     * Get debutannee
     *
     * @return int
     */
    public function getDebutannee()
    {
        return $this->debutannee;
    }

    /**
     * Set finannee
     *
     * @param integer $finannee
     *
     * @return Annee
     */
    public function setFinannee($finannee)
    {
        $this->finannee = $finannee;

        return $this;
    }

    /**
     * Get finannee
     *
     * @return int
     */
    public function getFinannee()
    {
        return $this->finannee;
    }

    /**
     * Set libannee
     *
     * @param string $libannee
     *
     * @return Annee
     */
    public function setLibannee($libannee)
    {
        $this->libannee = $libannee;

        return $this;
    }

    /**
     * Get libannee
     *
     * @return string
     */
    public function getLibannee()
    {
        return $this->libannee;
    }

    /**
     * Set libsessionexam
     *
     * @param string $libsessionexam
     *
     * @return Annee
     */
    public function setLibsessionexam($libsessionexam)
    {
        $this->libsessionexam = $libsessionexam;

        return $this;
    }

    /**
     * Get libsessionexam
     *
     * @return string
     */
    public function getLibsessionexam()
    {
        return $this->libsessionexam;
    }

    /**
     * Set datecomexam
     *
     * @param string $datecomexam
     *
     * @return Annee
     */
    public function setDatecomexam($datecomexam)
    {
        $this->datecomexam = $datecomexam;

        return $this;
    }

    /**
     * Get datecomexam
     *
     * @return string
     */
    public function getDatecomexam()
    {
        return $this->datecomexam;
    }
}

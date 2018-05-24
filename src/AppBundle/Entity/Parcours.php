<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parcours
 *
 * @ORM\Table(name="parcours")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ParcoursRepository")
 */
class Parcours
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
     * @ORM\Column(name="libparcours", type="string", length=255)
     */
    private $libparcours;

    /**
     * @var string
     *
     * @ORM\Column(name="abrevparcours", type="string", length=255)
     */
    private $abrevparcours;

    /**
     * Un Parcours concerne à une et une seule Mention
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Mention", inversedBy="parcours")
     * @ORM\JoinColumn(name="mention_id", referencedColumnName="id")
     */
     private $mention;


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
     * Set libparcours
     *
     * @param string $libparcours
     *
     * @return Parcours
     */
    public function setLibparcours($libparcours)
    {
        $this->libparcours = $libparcours;

        return $this;
    }

    /**
     * Get libparcours
     *
     * @return string
     */
    public function getLibparcours()
    {
        return $this->libparcours;
    }

    /**
     * Set abrevparcours
     *
     * @param string $abrevparcours
     *
     * @return Parcours
     */
    public function setAbrevparcours($abrevparcours)
    {
        $this->abrevparcours = $abrevparcours;

        return $this;
    }

    /**
     * Get abrevparcours
     *
     * @return string
     */
    public function getAbrevparcours()
    {
        return $this->abrevparcours;
    }

    /**
     * Set mention
     *
     * @param \AppBundle\Entity\Mention $mention
     *
     * @return Parcours
     */
    public function setMention(\AppBundle\Entity\Mention $mention = null)
    {
        $this->mention = $mention;

        return $this;
    }

    /**
     * Get mention
     *
     * @return \AppBundle\Entity\Mention
     */
    public function getMention()
    {
        return $this->mention;
    }
}

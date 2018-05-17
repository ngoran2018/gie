<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mention
 *
 * @ORM\Table(name="mention")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MentionRepository")
 */
class Mention
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
     * @ORM\Column(name="libmention", type="string", length=255)
     */
    private $libmention;

    /**
     * @var string
     *
     * @ORM\Column(name="abrevmention", type="string", length=255)
     */
    private $abrevmention;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau", type="string", length=255)
     */
    private $niveau;

    /**
     * Une mention concerne à une et une seule Filiere
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Filiere", inversedBy="mentions")
     * @ORM\JoinColumn(name="filiere_id", referencedColumnName="id")
     */
     private $filiere;


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
     * Set libmention
     *
     * @param string $libmention
     *
     * @return Mention
     */
    public function setLibmention($libmention)
    {
        $this->libmention = $libmention;

        return $this;
    }

    /**
     * Get libmention
     *
     * @return string
     */
    public function getLibmention()
    {
        return $this->libmention;
    }

    /**
     * Set abrevmention
     *
     * @param string $abrevmention
     *
     * @return Mention
     */
    public function setAbrevmention($abrevmention)
    {
        $this->abrevmention = $abrevmention;

        return $this;
    }

    /**
     * Get abrevmention
     *
     * @return string
     */
    public function getAbrevmention()
    {
        return $this->abrevmention;
    }

    /**
     * Set niveau
     *
     * @param string $niveau
     *
     * @return Mention
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return string
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set filiere
     *
     * @param \AppBundle\Entity\Filiere $filiere
     *
     * @return Mention
     */
    public function setFiliere(\AppBundle\Entity\Filiere $filiere = null)
    {
        $this->filiere = $filiere;

        return $this;
    }

    /**
     * Get filiere
     *
     * @return \AppBundle\Entity\Filiere
     */
    public function getFiliere()
    {
        return $this->filiere;
    }
}

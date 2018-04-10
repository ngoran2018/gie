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
}


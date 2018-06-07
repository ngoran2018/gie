<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typeue
 *
 * @ORM\Table(name="typeue")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TypeueRepository")
 */
class Typeue
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
     * @ORM\Column(name="libtypeue", type="string", length=255, nullable=true, unique=true)
     */
    private $libtypeue;


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
     * Set libtypeue
     *
     * @param string $libtypeue
     *
     * @return Typeue
     */
    public function setLibtypeue($libtypeue)
    {
        $this->libtypeue = $libtypeue;

        return $this;
    }

    /**
     * Get libtypeue
     *
     * @return string
     */
    public function getLibtypeue()
    {
        return $this->libtypeue;
    }
}


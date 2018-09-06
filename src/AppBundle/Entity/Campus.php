<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Campus
 *
 * @ORM\Table(name="campus")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CampusRepository")
 */
class Campus
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
     * @ORM\Column(name="libcampus", type="string", length=255)
     */
    private $libcampus;

    /**
     * @var string
     *
     * @ORM\Column(name="abrevcampus", type="string", length=50)
     */
    private $abrevcampus;

    /**
     * @var int
     *
     * @ORM\Column(name="seuilcampus", type="integer")
     */
    private $seuilcampus;
    /**
     * Un Campus appartient à un et un seule Hebergement
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Heberge", inversedBy="campus")
     * @ORM\JoinColumn(name="heberge_id", referencedColumnName="id")
     */
    private $heberge;


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
     * Set libcampus
     *
     * @param string $libcampus
     *
     * @return Campus
     */
    public function setLibcampus($libcampus)
    {
        $this->libcampus = $libcampus;

        return $this;
    }

    /**
     * Get libcampus
     *
     * @return string
     */
    public function getLibcampus()
    {
        return $this->libcampus;
    }

    /**
     * Set abrevcampus
     *
     * @param string $abrevcampus
     *
     * @return Campus
     */
    public function setAbrevcampus($abrevcampus)
    {
        $this->abrevcampus = $abrevcampus;

        return $this;
    }

    /**
     * Get abrevcampus
     *
     * @return string
     */
    public function getAbrevcampus()
    {
        return $this->abrevcampus;
    }

    /**
     * Set seuilcampus
     *
     * @param integer $seuilcampus
     *
     * @return Campus
     */
    public function setSeuilcampus($seuilcampus)
    {
        $this->seuilcampus = $seuilcampus;

        return $this;
    }

    /**
     * Get seuilcampus
     *
     * @return int
     */
    public function getSeuilcampus()
    {
        return $this->seuilcampus;
    }

    /**
     * Set heberge
     *
     * @param \AppBundle\Entity\Heberge $heberge
     *
     * @return Campus
     */
    public function setHeberge(\AppBundle\Entity\Heberge $heberge = null)
    {
        $this->heberge = $heberge;

        return $this;
    }

    /**
     * Get heberge
     *
     * @return \AppBundle\Entity\Heberge
     */
    public function getHeberge()
    {
        return $this->heberge;
    }

    public function __toString(){
        return $this->libcampus;
      }
}

<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Heberge
 *
 * @ORM\Table(name="heberge")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HebergeRepository")
 */
class Heberge
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
     * @ORM\Column(name="libheberge", type="string", length=255)
     */
    private $libheberge;

    /**
     * @var string
     *
     * @ORM\Column(name="abrevheberge", type="string", length=30)
     */
    private $abrevheberge;
    /**
     * @var int
     *
     * @ORM\Column(name="mtcoutheberge", type="integer")
     */
    private $mtcoutheberge;
    /**
     * @var int
     *
     * @ORM\Column(name="mtcautionheberge", type="integer")
     */
    private $mtcautionheberge;
     /**
     * un hébergement a plusieurs campus
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Campus", mappedBy="heberge")
     */
    private $campus;

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
     * Set libheberge
     *
     * @param string $libheberge
     *
     * @return Heberge
     */
    public function setLibheberge($libheberge)
    {
        $this->libheberge = $libheberge;

        return $this;
    }

    /**
     * Get libheberge
     *
     * @return string
     */
    public function getLibheberge()
    {
        return $this->libheberge;
    }

    /**
     * Set abrevheberge
     *
     * @param string $abrevheberge
     *
     * @return Heberge
     */
    public function setAbrevheberge($abrevheberge)
    {
        $this->abrevheberge = $abrevheberge;

        return $this;
    }

    /**
     * Get abrevheberge
     *
     * @return string
     */
    public function getAbrevheberge()
    {
        return $this->abrevheberge;
    }

    /**
     * Set mtcoutheberge
     *
     * @param integer $mtcoutheberge
     *
     * @return Heberge
     */
    public function setMtcoutheberge($mtcoutheberge)
    {
        $this->mtcoutheberge = $mtcoutheberge;

        return $this;
    }

    /**
     * Get mtcoutheberge
     *
     * @return integer
     */
    public function getMtcoutheberge()
    {
        return $this->mtcoutheberge;
    }

    /**
     * Set mtcautionheberge
     *
     * @param integer $mtcautionheberge
     *
     * @return Heberge
     */
    public function setMtcautionheberge($mtcautionheberge)
    {
        $this->mtcautionheberge = $mtcautionheberge;

        return $this;
    }

    /**
     * Get mtcautionheberge
     *
     * @return integer
     */
    public function getMtcautionheberge()
    {
        return $this->mtcautionheberge;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->campus = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add campus
     *
     * @param \AppBundle\Entity\Campus $campus
     *
     * @return Heberge
     */
    public function addCampus(\AppBundle\Entity\Campus $campus)
    {
        $this->campus[] = $campus;

        return $this;
    }

    /**
     * Remove campus
     *
     * @param \AppBundle\Entity\Campus $campus
     */
    public function removeCampus(\AppBundle\Entity\Campus $campus)
    {
        $this->campus->removeElement($campus);
    }

    /**
     * Get campus
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCampus()
    {
        return $this->campus;
    }
    public function __toString(){
        return $this->getAbrevheberge();
      }
}

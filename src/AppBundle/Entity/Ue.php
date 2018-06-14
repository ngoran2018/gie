<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ue
 *
 * @ORM\Table(name="ue")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UeRepository")
 */
class Ue
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
     * @ORM\Column(name="libue", type="string", length=255)
     */
    private $libue;

    /**
     * @var string
     *
     * @ORM\Column(name="abrevue", type="string", length=255)
     */
    private $abrevue;

    /**
     * Une Ue concerne à un et un seul Typeue
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Typeue", inversedBy="ues")
     * @ORM\JoinColumn(name="typeue_id", referencedColumnName="id")
     */
     private $typeue;

     /**
      * Une Ue concerne à un et un seul Semestre
      *
      * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Semestre", inversedBy="ues")
      * @ORM\JoinColumn(name="semest_id", referencedColumnName="id")
      */
      private $semestre;

      /**
       * Une Ue concerne à un et une seule Mention
       *
       * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Mention", inversedBy="ues")
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
     * Set libue
     *
     * @param string $libue
     *
     * @return Ue
     */
    public function setLibue($libue)
    {
        $this->libue = $libue;

        return $this;
    }

    /**
     * Get libue
     *
     * @return string
     */
    public function getLibue()
    {
        return $this->libue;
    }

    /**
     * Set abrevue
     *
     * @param string $abrevue
     *
     * @return Ue
     */
    public function setAbrevue($abrevue)
    {
        $this->abrevue = $abrevue;

        return $this;
    }

    /**
     * Get abrevue
     *
     * @return string
     */
    public function getAbrevue()
    {
        return $this->abrevue;
    }

    /**
     * Set typeue
     *
     * @param \AppBundle\Entity\Typeue $typeue
     *
     * @return Ue
     */
    public function setTypeue(\AppBundle\Entity\Typeue $typeue = null)
    {
        $this->typeue = $typeue;

        return $this;
    }

    /**
     * Get typeue
     *
     * @return \AppBundle\Entity\Typeue
     */
    public function getTypeue()
    {
        return $this->typeue;
    }

    /**
     * Set semestre
     *
     * @param \AppBundle\Entity\Semestre $semestre
     *
     * @return Ue
     */
    public function setSemestre(\AppBundle\Entity\Semestre $semestre = null)
    {
        $this->semestre = $semestre;

        return $this;
    }

    /**
     * Get semestre
     *
     * @return \AppBundle\Entity\Semestre
     */
    public function getSemestre()
    {
        return $this->semestre;
    }

    /**
     * Set mention
     *
     * @param \AppBundle\Entity\Mention $mention
     *
     * @return Ue
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

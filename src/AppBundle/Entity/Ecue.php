<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ecue
 *
 * @ORM\Table(name="ecue")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EcueRepository")
 */
class Ecue
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
     * @ORM\Column(name="libecue", type="string", length=255)
     */
    private $libecue;

    /**
     * @var string
     *
     * @ORM\Column(name="abrevecue", type="string", length=255)
     */
    private $abrevecue;

    /**
     * @var int
     *
     * @ORM\Column(name="creditecue", type="integer")
     */
    private $creditecue;

    /**
     * @var int
     *
     * @ORM\Column(name="ctt", type="integer")
     */
    private $ctt;

    /**
     * @var int
     *
     * @ORM\Column(name="cours", type="integer")
     */
    private $cours;

    /**
     * @var int
     *
     * @ORM\Column(name="tp", type="integer")
     */
    private $tp;

    /**
     * @var int
     *
     * @ORM\Column(name="tpe", type="integer")
     */
    private $tpe;

    /**
     * @var int
     *
     * @ORM\Column(name="autre", type="integer")
     */
    private $autre;
    /**
     * Un Ecue correspond à un et une seule Ue
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ue", inversedBy="ecue")
     * @ORM\JoinColumn(name="ue_id", referencedColumnName="id")
     */
     private $ue;


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
     * Set libecue
     *
     * @param string $libecue
     *
     * @return Ecue
     */
    public function setLibecue($libecue)
    {
        $this->libecue = $libecue;

        return $this;
    }

    /**
     * Get libecue
     *
     * @return string
     */
    public function getLibecue()
    {
        return $this->libecue;
    }

    /**
     * Set abrevecue
     *
     * @param string $abrevecue
     *
     * @return Ecue
     */
    public function setAbrevecue($abrevecue)
    {
        $this->abrevecue = $abrevecue;

        return $this;
    }

    /**
     * Get abrevecue
     *
     * @return string
     */
    public function getAbrevecue()
    {
        return $this->abrevecue;
    }

    /**
     * Set creditecue
     *
     * @param integer $creditecue
     *
     * @return Ecue
     */
    public function setCreditecue($creditecue)
    {
        $this->creditecue = $creditecue;

        return $this;
    }

    /**
     * Get creditecue
     *
     * @return int
     */
    public function getCreditecue()
    {
        return $this->creditecue;
    }

    /**
     * Set ctt
     *
     * @param integer $ctt
     *
     * @return Ecue
     */
    public function setCtt($ctt)
    {
        $this->ctt = $ctt;

        return $this;
    }

    /**
     * Get ctt
     *
     * @return int
     */
    public function getCtt()
    {
        return $this->ctt;
    }

    /**
     * Set cours
     *
     * @param integer $cours
     *
     * @return Ecue
     */
    public function setCours($cours)
    {
        $this->cours = $cours;

        return $this;
    }

    /**
     * Get cours
     *
     * @return int
     */
    public function getCours()
    {
        return $this->cours;
    }

    /**
     * Set tp
     *
     * @param integer $tp
     *
     * @return Ecue
     */
    public function setTp($tp)
    {
        $this->tp = $tp;

        return $this;
    }

    /**
     * Get tp
     *
     * @return int
     */
    public function getTp()
    {
        return $this->tp;
    }

    /**
     * Set tpe
     *
     * @param integer $tpe
     *
     * @return Ecue
     */
    public function setTpe($tpe)
    {
        $this->tpe = $tpe;

        return $this;
    }

    /**
     * Get tpe
     *
     * @return int
     */
    public function getTpe()
    {
        return $this->tpe;
    }

    /**
     * Set autre
     *
     * @param integer $autre
     *
     * @return Ecue
     */
    public function setAutre($autre)
    {
        $this->autre = $autre;

        return $this;
    }

    /**
     * Get autre
     *
     * @return int
     */
    public function getAutre()
    {
        return $this->autre;
    }

    /**
     * Set ue
     *
     * @param \AppBundle\Entity\Ue $ue
     *
     * @return Ecue
     */
    public function setUe(\AppBundle\Entity\Ue $ue = null)
    {
        $this->ue = $ue;

        return $this;
    }

    /**
     * Get ue
     *
     * @return \AppBundle\Entity\Ue
     */
    public function getUe()
    {
        return $this->ue;
    }
    public function __toString(){
      return $this->libecue;
    }
}

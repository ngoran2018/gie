<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Semestre
 *
 * @ORM\Table(name="semestre")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SemestreRepository")
 */
class Semestre
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
     * @ORM\Column(name="libsemestre", type="string", length=255, unique=true)
     */
    private $libsemestre;

    /**
     * un Semestre a plusieurs Ue
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Ue", mappedBy="semestre")
     */
     private $ues;


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
     * Set libsemestre
     *
     * @param string $libsemestre
     *
     * @return Semestre
     */
    public function setLibsemestre($libsemestre)
    {
        $this->libsemestre = $libsemestre;

        return $this;
    }

    /**
     * Get libsemestre
     *
     * @return string
     */
    public function getLibsemestre()
    {
        return $this->libsemestre;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ues = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ue
     *
     * @param \AppBundle\Entity\Ue $ue
     *
     * @return Semestre
     */
    public function addUe(\AppBundle\Entity\Ue $ue)
    {
        $this->ues[] = $ue;

        return $this;
    }

    /**
     * Remove ue
     *
     * @param \AppBundle\Entity\Ue $ue
     */
    public function removeUe(\AppBundle\Entity\Ue $ue)
    {
        $this->ues->removeElement($ue);
    }

    /**
     * Get ues
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUes()
    {
        return $this->ues;
    }
    public function __toString(){
      return $this->libsemestre;
    }
}

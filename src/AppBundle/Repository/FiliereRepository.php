<?php

namespace AppBundle\Repository;

/**
 * FiliereRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FiliereRepository extends \Doctrine\ORM\EntityRepository
{
  /**
   * Liste des filières selon l'ecole
   */
   public function findFiliere($ecole)
   {
     return $q = $this->createQueryBuilder('f')
                      ->innerJoin('f.ecole', 'e')
                      ->where('e.id = :ecole')
                      ->orderBy('f.libfiliere', 'ASC')
                      ->setParameter('ecole', $ecole)
     ;
   }
}

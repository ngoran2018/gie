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
                      ->innerJoin('f.tformation', 't')
                      ->where('e.id = :ecole')
                      ->andWhere('t.abrevformation = :formation')
                      ->orderBy('f.libfiliere', 'ASC')
                      ->setParameters(array(
                        'ecole'=> $ecole,
                        'formation'=> 'LMD'
                      ))
     ;
   }
   /**
   * Liste des filières LMD
   */
  public function findFiliereByFormation($formation)
  {
    return $q = $this->createQueryBuilder('f')
                      ->innerJoin('f.tformation', 't')
                      ->andWhere('t.abrevformation = :formation')
                      ->orderBy('f.libfiliere', 'ASC')
                      ->setParameter('formation', $formation)
                      ->getQuery()->getResult()
    ;
  }
}

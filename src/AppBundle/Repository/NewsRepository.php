<?php

namespace AppBundle\Repository;

/**
 * NewsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NewsRepository extends \Doctrine\ORM\EntityRepository
{
  public function getRecentNews($number = 2)
  {
      $dql = "SELECT n.content FROM AppBundle:News n ORDER BY n.id DESC";

      $query = $this->getEntityManager()->createQuery($dql);
      $query->setMaxResults($number);
      return $query->getResult();
  }
}

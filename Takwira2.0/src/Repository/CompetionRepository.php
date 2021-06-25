<?php

namespace App\Repository;

use App\Entity\Competion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Competion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Competion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Competion[]    findAll()
 * @method Competion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompetionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Competion::class);
    }

    // /**
    //  * @return Competion[] Returns an array of Competion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Competion
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

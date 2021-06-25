<?php

namespace App\Repository;

use App\Entity\Staduim;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Staduim|null find($id, $lockMode = null, $lockVersion = null)
 * @method Staduim|null findOneBy(array $criteria, array $orderBy = null)
 * @method Staduim[]    findAll()
 * @method Staduim[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StaduimRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Staduim::class);
    }

    // /**
    //  * @return Staduim[] Returns an array of Staduim objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Staduim
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\Entreneur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Entreneur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Entreneur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Entreneur[]    findAll()
 * @method Entreneur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntreneurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Entreneur::class);
    }

    // /**
    //  * @return Entreneur[] Returns an array of Entreneur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Entreneur
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\Entrainneur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Entrainneur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Entrainneur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Entrainneur[]    findAll()
 * @method Entrainneur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntrainneurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Entrainneur::class);
    }

    // /**
    //  * @return Entrainneur[] Returns an array of Entrainneur objects
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
    public function findOneBySomeField($value): ?Entrainneur
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

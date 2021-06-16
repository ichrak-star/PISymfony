<?php

namespace App\Repository;

use App\Entity\ResponsablePublication;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ResponsablePublication|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResponsablePublication|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResponsablePublication[]    findAll()
 * @method ResponsablePublication[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResponsablePublicationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResponsablePublication::class);
    }

    // /**
    //  * @return ResponsablePublication[] Returns an array of ResponsablePublication objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ResponsablePublication
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\ResponsableTicket;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ResponsableTicket|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResponsableTicket|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResponsableTicket[]    findAll()
 * @method ResponsableTicket[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResponsableTicketRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResponsableTicket::class);
    }

    // /**
    //  * @return ResponsableTicket[] Returns an array of ResponsableTicket objects
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
    public function findOneBySomeField($value): ?ResponsableTicket
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

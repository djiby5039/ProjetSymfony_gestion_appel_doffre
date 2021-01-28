<?php

namespace App\Repository;

use App\Entity\Sommaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Sommaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sommaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sommaire[]    findAll()
 * @method Sommaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SommaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sommaire::class);
    }

    // /**
    //  * @return Sommaire[] Returns an array of Sommaire objects
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
    public function findOneBySomeField($value): ?Sommaire
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

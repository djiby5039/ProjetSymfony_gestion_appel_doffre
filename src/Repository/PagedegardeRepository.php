<?php

namespace App\Repository;

use App\Entity\Pagedegarde;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Pagedegarde|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pagedegarde|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pagedegarde[]    findAll()
 * @method Pagedegarde[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PagedegardeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pagedegarde::class);
    }

    // /**
    //  * @return Pagedegarde[] Returns an array of Pagedegarde objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Pagedegarde
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

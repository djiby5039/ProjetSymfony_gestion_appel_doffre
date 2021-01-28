<?php

namespace App\Repository;

use App\Entity\Dossieradministratif;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Dossieradministratif|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dossieradministratif|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dossieradministratif[]    findAll()
 * @method Dossieradministratif[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DossieradministratifRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dossieradministratif::class);
    }

    // /**
    //  * @return Dossieradministratif[] Returns an array of Dossieradministratif objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Dossieradministratif
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\Offredappel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Offredappel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Offredappel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Offredappel[]    findAll()
 * @method Offredappel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffredappelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offredappel::class);
    }

    // /**
    //  * @return Offredappel[] Returns an array of Offredappel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Offredappel
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

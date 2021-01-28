<?php

namespace App\Repository;

use App\Entity\LettreDeRetrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method LettreDeRetrait|null find($id, $lockMode = null, $lockVersion = null)
 * @method LettreDeRetrait|null findOneBy(array $criteria, array $orderBy = null)
 * @method LettreDeRetrait[]    findAll()
 * @method LettreDeRetrait[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LettreDeRetraitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LettreDeRetrait::class);
    }

    // /**
    //  * @return LettreDeRetrait[] Returns an array of LettreDeRetrait objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LettreDeRetrait
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

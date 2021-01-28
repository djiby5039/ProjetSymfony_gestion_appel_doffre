<?php

namespace App\Repository;

use App\Entity\Reponseoffredappel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Reponseoffredappel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reponseoffredappel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reponseoffredappel[]    findAll()
 * @method Reponseoffredappel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReponseoffredappelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reponseoffredappel::class);
    }

    // /**
    //  * @return Reponseoffredappel[] Returns an array of Reponseoffredappel objects
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
    public function findOneBySomeField($value): ?Reponseoffredappel
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

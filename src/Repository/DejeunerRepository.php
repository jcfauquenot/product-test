<?php

namespace App\Repository;

use App\Entity\Dejeuner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Dejeuner|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dejeuner|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dejeuner[]    findAll()
 * @method Dejeuner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DejeunerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dejeuner::class);
    }

    // /**
    //  * @return Dejeuner[] Returns an array of Dejeuner objects
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
    public function findOneBySomeField($value): ?Dejeuner
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

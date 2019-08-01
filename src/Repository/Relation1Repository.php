<?php

namespace App\Repository;

use App\Entity\Relation1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Relation1|null find($id, $lockMode = null, $lockVersion = null)
 * @method Relation1|null findOneBy(array $criteria, array $orderBy = null)
 * @method Relation1[]    findAll()
 * @method Relation1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Relation1Repository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Relation1::class);
    }

    // /**
    //  * @return Relation1[] Returns an array of Relation1 objects
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
    public function findOneBySomeField($value): ?Relation1
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

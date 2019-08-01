<?php

namespace App\Repository;

use App\Entity\Relation2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Relation2|null find($id, $lockMode = null, $lockVersion = null)
 * @method Relation2|null findOneBy(array $criteria, array $orderBy = null)
 * @method Relation2[]    findAll()
 * @method Relation2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Relation2Repository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Relation2::class);
    }

    // /**
    //  * @return Relation2[] Returns an array of Relation2 objects
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
    public function findOneBySomeField($value): ?Relation2
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

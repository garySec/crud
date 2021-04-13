<?php

namespace App\Repository;

use App\Entity\Post2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Post2|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post2|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post2[]    findAll()
 * @method Post2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Post2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post2::class);
    }

    // /**
    //  * @return Post2[] Returns an array of Post2 objects
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
    public function findOneBySomeField($value): ?Post2
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

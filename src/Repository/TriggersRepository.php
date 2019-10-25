<?php

namespace App\Repository;

use App\Entity\Triggers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Triggers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Triggers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Triggers[]    findAll()
 * @method Triggers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TriggersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Triggers::class);
    }

    // /**
    //  * @return Courses[] Returns an array of Courses objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Courses
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
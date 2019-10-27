<?php

namespace App\Repository;

use App\Entity\UserTask;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UserTask|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserTask|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserTask[]    findAll()
 * @method UserTask[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserTaskRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserTask::class);
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

//    public function findOneByEmailField($value): ?User
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.email = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//            ;
//    }

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

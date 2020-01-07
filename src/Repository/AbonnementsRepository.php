<?php

namespace App\Repository;

use App\Entity\Abonnements;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Abonnements|null find($id, $lockMode = null, $lockVersion = null)
 * @method Abonnements|null findOneBy(array $criteria, array $orderBy = null)
 * @method Abonnements[]    findAll()
 * @method Abonnements[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AbonnementsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Abonnements::class);
    }

    // /**
    //  * @return Abonnements[] Returns an array of Abonnements objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Abonnements
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

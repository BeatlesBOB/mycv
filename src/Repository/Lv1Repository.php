<?php

namespace App\Repository;

use App\Entity\Lv1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Lv1|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lv1|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lv1[]    findAll()
 * @method Lv1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Lv1Repository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Lv1::class);
    }

    // /**
    //  * @return Lv1[] Returns an array of Lv1 objects
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
    public function findOneBySomeField($value): ?Lv1
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

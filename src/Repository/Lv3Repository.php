<?php

namespace App\Repository;

use App\Entity\Lv3;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Lv3|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lv3|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lv3[]    findAll()
 * @method Lv3[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Lv3Repository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Lv3::class);
    }

    // /**
    //  * @return Lv3[] Returns an array of Lv3 objects
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
    public function findOneBySomeField($value): ?Lv3
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

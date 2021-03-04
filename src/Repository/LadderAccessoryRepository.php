<?php

namespace App\Repository;

use App\Entity\LadderAccessory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LadderAccessory|null find($id, $lockMode = null, $lockVersion = null)
 * @method LadderAccessory|null findOneBy(array $criteria, array $orderBy = null)
 * @method LadderAccessory[]    findAll()
 * @method LadderAccessory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LadderAccessoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LadderAccessory::class);
    }

    // /**
    //  * @return LadderAccessory[] Returns an array of LadderAccessory objects
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
    public function findOneBySomeField($value): ?LadderAccessory
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

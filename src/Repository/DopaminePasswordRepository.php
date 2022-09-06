<?php

namespace App\Repository;

use App\Entity\DopaminePassword;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DopaminePassword|null find($id, $lockMode = null, $lockVersion = null)
 * @method DopaminePassword|null findOneBy(array $criteria, array $orderBy = null)
 * @method DopaminePassword[]    findAll()
 * @method DopaminePassword[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DopaminePasswordRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DopaminePassword::class);
    }

    // /**
    //  * @return DopaminePassword[] Returns an array of DopaminePassword objects
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
    public function findOneBySomeField($value): ?DopaminePassword
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

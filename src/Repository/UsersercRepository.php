<?php

namespace App\Repository;

use App\Entity\Userserc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Userserc|null find($id, $lockMode = null, $lockVersion = null)
 * @method Userserc|null findOneBy(array $criteria, array $orderBy = null)
 * @method Userserc[]    findAll()
 * @method Userserc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersercRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Userserc::class);
    }

    // /**
    //  * @return Userserc[] Returns an array of Userserc objects
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

    /*
    public function findOneBySomeField($value): ?Userserc
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

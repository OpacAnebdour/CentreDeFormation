<?php

namespace App\Repository;

use App\Entity\GroupEtudiant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GroupEtudiant|null find($id, $lockMode = null, $lockVersion = null)
 * @method GroupEtudiant|null findOneBy(array $criteria, array $orderBy = null)
 * @method GroupEtudiant[]    findAll()
 * @method GroupEtudiant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroupEtudiantRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GroupEtudiant::class);
    }

    // /**
    //  * @return GroupEtudiant[] Returns an array of GroupEtudiant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GroupEtudiant
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

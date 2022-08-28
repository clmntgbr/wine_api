<?php

namespace App\Repository;

use App\Entity\Cellar;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cellar>
 *
 * @method Cellar|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cellar|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cellar[]    findAll()
 * @method Cellar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CellarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cellar::class);
    }

    public function add(Cellar $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Cellar $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getCellarExceptId(int $id, User $user): ?Cellar
    {
        return $this->createQueryBuilder('c')
        ->where('c.id != :id')
        ->andWhere('c.user = :user')
        ->setParameters(['id' => $id, 'user' => $user])
        ->setMaxResults(1)
        ->getQuery()
        ->getOneOrNullResult();
    }

//    /**
//     * @return Cellar[] Returns an array of Cellar objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Cellar
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
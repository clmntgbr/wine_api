<?php

namespace App\Repository;

use App\Entity\GrapeVariety;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GrapeVariety>
 *
 * @method GrapeVariety|null find($id, $lockMode = null, $lockVersion = null)
 * @method GrapeVariety|null findOneBy(array $criteria, array $orderBy = null)
 * @method GrapeVariety[]    findAll()
 * @method GrapeVariety[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GrapeVarietyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GrapeVariety::class);
    }

    public function add(GrapeVariety $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(GrapeVariety $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return GrapeVariety[] Returns an array of GrapeVariety objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?GrapeVariety
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

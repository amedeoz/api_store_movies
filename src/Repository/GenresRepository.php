<?php

namespace App\Repository;

use App\Entity\Genres;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Genres|null find($id, $lockMode = null, $lockVersion = null)
 * @method Genres|null findOneBy(array $criteria, array $orderBy = null)
 * @method Genres[]    findAll()
 * @method Genres[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GenresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Genres::class);
    }

    public function findByGenre($genre)
    {
            return $this->createQueryBuilder('g')
            ->andWhere('g.type like :param')
            ->setParameter('param', '%'.$genre.'%')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return Genres[] Returns an array of Genres objects
    //  */
    //
    
}

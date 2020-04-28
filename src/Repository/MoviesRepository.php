<?php

namespace App\Repository;

use App\Entity\Movies;
use App\Entity\Genres;
use App\Entity\Weeks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Movies|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movies|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movies[]    findAll()
 * @method Movies[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MoviesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Movies::class);
    }

    public function findByTitle($title)
    {
        return $this->createQueryBuilder('m')
        ->andWhere('m.title like :param')
        ->setParameter('param', '%'.$title.'%')
        ->getQuery()
        ->getResult();
    }


    // /**
    //  * @return Movies[] Returns an array of Movies objects
    //  */
    
}

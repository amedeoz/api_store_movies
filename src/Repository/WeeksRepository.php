<?php

namespace App\Repository;

use App\Entity\Weeks;
use App\Entity\Movies;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr\Join;

/**
 * @method Weeks|null find($id, $lockMode = null, $lockVersion = null)
 * @method Weeks|null findOneBy(array $criteria, array $orderBy = null)
 * @method Weeks[]    findAll()
 * @method Weeks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeeksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Weeks::class);
    }

    public function findByWeeks($weekNum)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.number = :param')
            ->setParameter('param', $weekNum)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return Weeks[] Returns an array of Weeks objects
    //  */
    
}

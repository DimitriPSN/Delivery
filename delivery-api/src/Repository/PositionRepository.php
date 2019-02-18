<?php
namespace App\Repository;

use Ws\Delivery\Common\Entity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PositionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Position::class);
    }

    public function findByParcelNumber($parcelNumber)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.parcelNumber = :p')
            ->setParameter(':p', $parcelNumber)
            ->orderBy('d.`date', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }
}
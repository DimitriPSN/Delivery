<?php
namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

use Ws\Delivery\Common\Entity\Position;

class PositionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Position::class);
    }

    public function getAllPosition()
    {
        return $this->createQuery("SELECT DISTINCT parcelNumber FROM Positions")->getResult();
    }
}
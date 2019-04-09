<?php
declare(strict_types=1);


namespace App\Repository;

use App\Entity\Fare;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class FareRepository
 * @package App\Repository
 */
class FareRepository extends ServiceEntityRepository
{
    /**
     * CountryRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Fare::class);
    }

}

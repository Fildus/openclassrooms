<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\Ticket;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


/**
 * Class TicketRepository
 * @package App\Repository
 */
class TicketRepository extends ServiceEntityRepository
{
    /**
     * CountryRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ticket::class);
    }

    /**
     * @param string $day
     * @param int $places
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function placesRemaining(string $day, int $places = 1000)
    {
        $queryBuilder = $this
            ->createQueryBuilder('a')
            ->where('a.date = ?1')
            ->setParameter(1, $day)
            ->select('COUNT(a)')
            ->getQuery()
            ->getSingleScalarResult()
        ;
        return $places - (int) $queryBuilder;
    }
}

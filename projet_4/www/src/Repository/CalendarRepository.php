<?php
declare(strict_types=1);


namespace App\Repository;

use App\Entity\Calendar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class CalendarRepository
 * @package App\Repository
 */
class CalendarRepository extends ServiceEntityRepository
{
    /**
     * CountryRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Calendar::class);
    }

    /**
     * DateTime object SQL format
     *
     * @param $day
     * @return mixed
     */
    public function isOpened(\DateTime $day)
    {
        if (date_format($day,'Y') !== '2018'){
            return false;
        }
        return $this->findOneBy(['day'=>$day])->getOpened();
    }

}

<?php
declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Fare;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class FareFixtures
 * @package App\DataFixtures
 */
class FareFixtures extends Fixture
{

    private static $fares = [
        ['normal',  16],
        ['enfant',  8 ],
        ['senior',  12],
        ['reduit',  10],
        ['gratuit',  0]
    ];

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager):void
    {
        foreach (self::$fares as $v) {
            $fare = new Fare();
            $fare
                ->setName($v[0])
                ->setPrice($v[1]);
            $manager->persist($fare);
        }

        $manager->flush();
    }

}
<?php
declare(strict_types=1);


namespace App\DataFixtures;

use App\Entity\Calendar;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


/**
 * Class CalendarFixtures
 * @package App\DataFixtures
 */
class CalendarFixtures extends Fixture
{

    /**
     * @var string
     */
    private $date = '2018-01-01';

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager):void
    {
        for ($i=0;$i<365;$i++){
            if ($i>0){
                $this->date = date('Y-m-d',strtotime($this->date.' +1 day'));
            }
            $calendar = new Calendar();
            $calendar->setDay(new DateTime($this->date));
            if (
                date('l',strtotime($this->date)) === 'Tuesday' ||
                date('l',strtotime($this->date)) === 'Sunday' ||
                $this->date === '2018-05-01'||
                $this->date === '2018-11-01'||
                $this->date === '2018-12-25'){
                $calendar->setOpened(false);
            }else{
                $calendar->setOpened(true);
            }
            $manager->persist($calendar);
        }
        $manager->flush();
    }
}
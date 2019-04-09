<?php
declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Order;
use App\Entity\Ticket;
use App\Repository\FareRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Visitor;

/**
 * Class Visitor
 * @package App\DataFixtures
 */
class BuyingTicketsFixtures extends Fixture implements DependentFixtureInterface
{

    /**
     * @var FareRepository
     */
    private $fareRepository;

    /**
     * VisitorFixtures constructor.
     * @param FareRepository $fareRepository
     */
    public function __construct(FareRepository $fareRepository)
    {
        $this->fareRepository = $fareRepository;
    }

    /**
     * @param ObjectManager $manager
     * @throws \Exception
     */
    public function load(ObjectManager $manager):void
    {
        $visitors = [];
        for ($i = 1; $i <= 998 ; $i++){
            $visitors[$i]['mail']       = 'someone'.$i.'@msn.com';
            $visitors[$i]['firstName']  = 'firstName-'.$i;
            $visitors[$i]['lastName']   = 'lastName-'.$i;
            $visitors[$i]['birthday']   = new \DateTime('2000-01-01');
            $visitors[$i]['country']    = 'fr';
            $visitors[$i]['date']       = new \DateTime('2018-07-21');
            $visitors[$i]['fareType']   = false;
            $visitors[$i]['discount']   = false;
            $visitors[$i]['orderDate']  = new \DateTime();
            $visitors[$i]['stripeToken']= md5(random_bytes(10));
        }

        foreach ($visitors as $k => $v){
            $ticket     = new Ticket();
            $visitor    = new Visitor();
            $order      = new Order();
            $fare       = $this->fareRepository->findOneBy(['name'=>'normal']);

            $visitor
                ->setFirstName($visitors[$k]['firstName'])
                ->setLastName($visitors[$k]['lastName'])
                ->setBirthday($visitors[$k]['birthday'])
                ->setCountry($visitors[$k]['country'])
                ;

            $ticket
                ->setVisitor($visitor)
                ->setDate($visitors[$k]['date'])
                ->setFare($fare)
                ->setDiscount($visitors[$k]['discount'])
                ->setFareType($visitors[$k]['fareType'])
                ;

            $order
                ->setMail($visitors[$k]['mail'])
                ->setTotal(16)
                ->setOrderDate($visitors[$k]['orderDate'])
                ->setStripeToken($visitors[$k]['stripeToken'])
                ->setTicket($ticket->setOrder($order))
                ;

            $manager->persist($order);
            $manager->flush();
        }
        // alias test="bin/console doctrine:database:drop --force && bin/console doctrine:database:create && bin/console doctrine:schema:update --force && bin/console doctrine:fixtures:load"
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [
            CalendarFixtures::class,
            FareFixtures::class
        ];
    }
}

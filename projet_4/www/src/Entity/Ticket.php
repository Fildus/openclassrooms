<?php
declare(strict_types=1);


namespace App\Entity;

use App\Validator\IsBookingFareValid;
use App\Validator\IsBookingFareValidValidator;
use App\Validator\IsBookingValid;
use App\Validator\IsHourValid;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TicketRepository")
 * @ORM\Table(name="tickets")
 * @ORM\HasLifecycleCallbacks()
 */
class Ticket
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Order", inversedBy="ticket", fetch="EAGER")
     * @Assert\Type(type="App\ENtity\OrderFixtures")
     */
    private $order;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Visitor", cascade={"persist"}, fetch="EAGER")
     * @Assert\Valid()
     * @Assert\Type(type="App\Entity\Visitor")
     */
    private $visitor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fare;

    /**
     * @ORM\Column(type="boolean")
     */
    private $fareType = false;

    /**
     * @ORM\Column(type="date")
     * @IsBookingValid()
     */
    private $date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $discount;

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param mixed $discount
     * @return Ticket
     */
    public function setDiscount($discount): self
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param $order
     * @return Ticket
     */
    public function setOrder($order): self
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVisitor()
    {
        return $this->visitor;
    }

    /**
     * @param $visitor
     * @return Ticket
     */
    public function setVisitor($visitor): self
    {
        $this->visitor = $visitor;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFare()
    {
        return unserialize($this->fare);
    }

    /**
     * @param $fare
     * @return Ticket
     */
    public function setFare($fare):self
    {
        $this->fare = serialize($fare);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFareType()
    {
        return $this->fareType;
    }

    /**
     * @param $fareType
     * @return Ticket
     */
    public function setFareType($fareType): self
    {
        $this->fareType = $fareType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param $date
     * @return Ticket
     */
    public function setDate($date): self
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @param ExecutionContextInterface $context
     * @Assert\Callback()
     * @throws \Exception
     */
    public function hourIsValid(ExecutionContextInterface $context)
    {
        if ($this->fareType === false){
            $value = $context->getValue()->getDate();
            if (date_format(new \DateTime(),'d-m-Y') === date_format($value, 'd-m-Y') &&
                (new \DateTime())->format('H') >= '14'){
                $context
                    ->buildViolation(
                        'Il est "{{ hourForm }}" .Vous ne pouvez pas commander un billet le jour même après 
                        "{{ hourLimit }}". Si vous souhaitez tout de même commander, veuillez cocher "tarif demi journée"')
                    ->setParameter('{{ hourLimit }}', '14h')
                    ->setParameter('{{ hourForm }}', date_format(new \DateTime(),'H\hi'))
                    ->addViolation();
            }
        }
    }

}
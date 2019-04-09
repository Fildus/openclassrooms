<?php
declare(strict_types=1);


namespace App\Entity;

use App\Validator\IsDateAvailable;
use App\Validator\IsTotalValid;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;


/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 * @ORM\Table(name="orders")
 * @ORM\HasLifecycleCallbacks()
 */
class Order
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message = "L'email '{{ value }}' n'est pas valide.",
     *     checkMX = true,
     *     checkHost=true
     * )
     */
    private $mail;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $total;

    /**
     * @ORM\Column(type="date", nullable=false)
     * @Assert\DateTime()
     * @Assert\NotBlank()
     */
    private $orderDate;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ticket", mappedBy="order", cascade={"persist"}, fetch="EAGER")
     * @IsDateAvailable()
     * @Assert\Valid()
     */
    private $ticket;

    /**
     * @ORM\Column(length=32)
     */
    private $stripeToken;

    /**
     * OrderFixtures constructor.
     */
    public function __construct()
    {
        $this->setOrderDate(new \DateTime());
        $this->ticket = new ArrayCollection();
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
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     * @return Order
     */
    public function setMail($mail): Order
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     * @return Order
     */
    public function setTotal($total): Order
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderDate()
    {
        return $this->orderDate;
    }

    /**
     * @param mixed $orderDate
     * @return Order
     */
    public function setOrderDate($orderDate): Order
    {
        $this->orderDate = $orderDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    /**
     * @param mixed $ticket
     * @return Order
     */
    public function setTicket($ticket): Order
    {
        $this->ticket[] = $ticket;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getStripeToken()
    {
        return $this->stripeToken;
    }

    /**
     * @param $stripeToken
     * @return Order
     */
    public function setStripeToken($stripeToken): self
    {
        $this->stripeToken = $stripeToken;
        return $this;
    }

    /**
     * @param ExecutionContextInterface $context
     * @Assert\Callback()
     * @throws \Exception
     */
    public function aTLeastOneTicket(ExecutionContextInterface $context)
    {
        if ($this->getTicket()->isEmpty()){
            $context
            ->buildViolation('aTLeastOneTicket')
            ->addViolation();
        }
    }

}
<?php
declare(strict_types=1);

namespace App\Validator;

use App\Repository\TicketRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Class IsDateAvailableValidator
 * @package App\Validator
 */
class IsDateAvailableValidator extends ConstraintValidator
{


    /**
     * IsDateAvailableValidator constructor.
     * @param TicketRepository $ticketRepository
     */
    public function __construct(TicketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    /**
     * Checks if the passed value is valid.
     *
     * @param mixed $value The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function validate($value, Constraint $constraint)
    {
        $date = [];
        foreach ($value as $ticket){
            $date[] = $ticket->getDate()->format('Y-m-d');
        }

        foreach (array_count_values($date) as $k => $v){
            $placesRemaining = $this->ticketRepository->placesRemaining($k,1000);
            if ($placesRemaining < $v){
                $placesRemaining <= 1?
                    $context = $this->context->buildViolation($constraint->place):
                    $context = $this->context->buildViolation($constraint->places);
                $context
                    ->setParameter('{{ nbr }}', $placesRemaining)
                    ->setParameter('{{ date }}', date_format((new \DateTime($k)),'d-M-Y'))
                    ->setParameter('{{ nbrAsked }}', $v)
                    ->addViolation();
            }
        }
    }
}

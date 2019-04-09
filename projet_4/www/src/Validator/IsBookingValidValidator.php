<?php
declare(strict_types=1);

namespace App\Validator;

use App\Repository\CalendarRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Class IsBookingValidValidator
 * @package App\Validator
 */
class IsBookingValidValidator extends ConstraintValidator
{

    /**
     * IsBookingValidValidator constructor.
     * @param CalendarRepository $calendarRepository
     */
    public function __construct(CalendarRepository $calendarRepository)
    {
        $this->calendarRepository = $calendarRepository;
    }

    /**
     * Checks if the passed value is valid.
     *
     * @param mixed $value The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     */
    public function validate($value, Constraint $constraint)
    {
        if (date_format($value,'Y') !== '2018'){
            $this->context
                ->buildViolation($constraint->notAvailable)
                ->addViolation();
        }
        if ($value < (new \DateTime()) &&
            $value->format('d-m-Y') !== (new \DateTime())->format('d-m-Y')){
            $this->context
                ->buildViolation($constraint->pastDay)
                ->addViolation();
        }
        if (!$this->calendarRepository->isOpened($value)){
            $this->context
                ->buildViolation($constraint->closedDay)
                ->setParameter('{{ dateForm }}', date_format($value,'d-m-Y'))
                ->addViolation();
        }

    }
}

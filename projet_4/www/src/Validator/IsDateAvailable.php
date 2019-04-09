<?php
declare(strict_types=1);

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class IsDateAvailable extends Constraint
{
    /*
     * Any public properties become valid options for the annotation.
     * Then, use these in your validator class.
     */
    public $places = 'Vous souhaitez commander {{ nbrAsked }} place\\s, hors {{ nbr }} places sont disponibles pour le "{{ date }}".';
    public $place = 'Vous souhaitez commander {{ nbrAsked }} place\\s, hors {{ nbr }} place est disponible pour le "{{ date }}".';
}

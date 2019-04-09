<?php

namespace App\Model\Lib;
use Twig_Loader_Filesystem;
use Twig_Environment;

/**
 * Class Twig
 * @package App\Model\Lib
 */
class Twig{

    /**
     * @return Twig_Environment
     */
    static function run()
    {
    $loader = new Twig_Loader_Filesystem([
        /*          Users           */
        'App/View/FrontOffice',
        'App/View/FrontOffice/Templates',
        'App/View/FrontOffice/Parts',
        'App/View/FrontOffice/Form',
        'App/View/FrontOffice/Pages',
        'App/View/FrontOffice/Errors',
        'App/View/FrontOffice/Alerts',

        /*          Admin           */
        'App/View/BackOffice',
        'App/View/BackOffice/Templates',
        'App/View/BackOffice/Parts',
        'App/View/BackOffice/Form',
        'App/View/BackOffice/Pages',
        'App/View/BackOffice/Errors',
        'App/View/BackOffice/Alerts'
    ]);

    $twig = new Twig_Environment($loader, [
      'cache' => 'Web/Temp',
      'autoescape' => FALSE
    ]);

    return $twig;
  }
}
<?php


namespace App\Controller;
use App\Model\Lib\Twig;


/**
 * Class Errors
 * @package App\Controller
 */
class Errors
{

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public static function pageNotFound():void
    {
        try {
            echo Twig::run()->render('Page404.twig');
        } catch (\Twig_Error_Loader $exception) {
            throw new \Twig_Error_Loader("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
        } catch (\Twig_Error_Runtime $exception) {
            throw new \Twig_Error_Runtime("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
        } catch (\Twig_Error_Syntax $exception) {
            throw new \Twig_Error_Syntax("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
        }
    }

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public static function accessDenied():void
    {
        try{
        echo Twig::run()->render( 'AccessDenied.twig' );
        } catch (\Twig_Error_Loader $exception) {
            throw new \Twig_Error_Loader("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
        } catch (\Twig_Error_Runtime $exception) {
            throw new \Twig_Error_Runtime("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
        } catch (\Twig_Error_Syntax $exception) {
            throw new \Twig_Error_Syntax("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
        }
    }

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public static function badInformation():void
    {
        try{
            echo Twig::run()->render( 'BadInformation.twig' );
        } catch (\Twig_Error_Loader $exception) {
            throw new \Twig_Error_Loader("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
        } catch (\Twig_Error_Runtime $exception) {
            throw new \Twig_Error_Runtime("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
        } catch (\Twig_Error_Syntax $exception) {
            throw new \Twig_Error_Syntax("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
        }
    }
}
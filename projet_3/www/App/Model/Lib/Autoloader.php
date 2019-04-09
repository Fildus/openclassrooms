<?php


namespace App\Model\Lib;


/**
 * Class Autoloader
 * @package App\Model\Lib
 */
class Autoloader{

    public static function register()
    {
        spl_autoload_register([__CLASS__,'autoload']);
    }

    /**
     * Autoload for \App AND TWIG
     * @param string $class_name
     */
    private static function autoload(string $class_name)
    {
        if (0 === strpos($class_name, "Twig_") OR 0 === strpos($class_name, "App\\")){
            $modif_class_name = str_replace('\\', '/', $class_name);
            if (FALSE !== strpos($class_name, "Twig_")) {
                $modif_class_name = preg_replace('#^(.*)(Twig_)(.*)$#','$2$3',$class_name);
                $modif_class_name = str_replace('_','/',$modif_class_name);
                require_once "Vendor/Twig-2.4.4/lib/".$modif_class_name.'.php';
            }else{
                require_once $modif_class_name .'.php';
            }
        }
    }
}
Autoloader::register();
<?php

namespace Find_a_nanny;

class Autoloader{

    private static $projectNamespace = 'Find_a_nanny';

    static function register(){
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    static function autoload($class){
        if (preg_match('#('.self::$projectNamespace.')#',$class)){
            $class = str_replace(self::$projectNamespace.'\\','/',$class);
            $class = str_replace('\\','/',$class);
            require plugin_dir_path(__FILE__).$class.'.php';
        }
    }
}

Autoloader::register();
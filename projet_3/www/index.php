<?php
session_start();


use App\Model\Router\Router;

ini_set('display_errors',1);
ini_set('log_errors',1);
//ini_set('error_log', __DIR__.'/Var/ErrorsLogs/log.txt');
error_reporting(E_ALL);

require 'App/Model/Lib/Autoloader.php';

$_ENV['dir'] = __DIR__;

try {
    new Router;
} catch (\Exception $exception) {
    new \Exception($exception->getMessage());
}
<?php


namespace App\Model\Router;
use App\Controller\Errors;
use App\Model\Lib\Access;
use App\Model\Manager\Manager;

/**
 * Class Router
 * @package App\Model\Router
 */
class Router
{

    public $route;

    private $controllerNamespace = 'App\\Controller\\';

    /**
     * Router constructor.
     * @throws \Exception
     */
    public function __construct(){
        $this->route = new Route;
        try {
            $this->file($this->route->filesCallable());
        } catch (\Exception $exception) {
            throw new \Exception("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
        }
        try {
            $this->post($this->route->postCallable());
        } catch (\Exception $exception) {
            throw new \Exception("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
        }
        try {
            $this->get ($this->route->getCallable   ());
        } catch (\Exception $exception) {
            throw new \Exception("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
        }
    }

    /**
     * @param array $filesCallable
     * @return bool|mixed
     * @throws \Exception
     */
    public function file($filesCallable)
    {
        if (isset($_FILES) AND !empty($_FILES)){
            $controller = $filesCallable['route']['0'];
            $method     = $filesCallable['route']['1'];
            $rights     = $filesCallable['route']['2'];

            $data       = $filesCallable['data'];

            if(Access::access($rights)){
                try {
                    RETURN (NEW Manager)->crud($controller, $method, $data);
                } catch (\Exception $exception) {
                    throw new \Exception("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
                }
            }else{
                Errors::accessDenied();
            }
        }
        RETURN FALSE;
    }

    /**
     * @param array $postCallable
     * @return bool|mixed
     * @throws \Exception
     */
    public function post(array $postCallable)
    {
        if (!empty($postCallable)){
            $controller = $postCallable['route']['0'];
            $method     = $postCallable['route']['1'];
            $rights     = $postCallable['route']['2'];

            $data       = $postCallable['data'];

            if(Access::access($rights)){
                try {
                    (new Manager)->crud($controller, $method, $data);
                    RETURN TRUE;
                } catch (\Exception $exception) {
                    throw new \Exception("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
                }
            }else{
                Errors::accessDenied();
            }
        }
        return FALSE;
    }

    /**
     * @param array $getCallable
     * @throws \Exception
     */
    public function get(array $getCallable)
    {

        if (isset($this->route->getCallable()['Controller'],
                  $this->route->getCallable()['Method'])){

            $controller = $this->controllerNamespace.ucfirst($getCallable['Controller']);
            $method     = $getCallable['Method'];
            $param      = $getCallable['Parameter'];
            $rights     = $getCallable['Auth'];

            if(Access::access($rights)){
                if(!empty($param)){
                    try {
                        ( new $controller )->$method($param);
                        RETURN TRUE;
                    } catch (\Exception $exception) {
                        throw new \Exception("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
                    }
                }
                try {
                    ( new $controller )->$method();
                    RETURN TRUE;
                } catch (\Exception $exception) {
                    throw new \Exception("Class: ".__CLASS__." méthode: ".__METHOD__."---".$exception);
                }
            }
            Errors::accessDenied();
        }else{
            Errors::pageNotFound();
        }
        RETURN FALSE;
    }
}
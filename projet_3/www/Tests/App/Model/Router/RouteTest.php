<?php
declare(strict_types=1);

namespace Tests\App\Model\Router;

use PHPUnit\Framework\TestCase;
use App\Model\Router\Route;

class RouteTest extends TestCase
{

    use PathTest;

    /**
     * test de la fonction getCallable() en (sortie) vs $_GET['url'] = ? (en entrée)
     * Vérifie l'égalité Entrée/Sortie
     * @test
     */
    public function VerifyRouteGetCallable()
    {
        foreach ($this->routesGetCallable as $item){
            $_GET['url'] = $item['0'];
            $route = new Route;
            $this->assertContains($item['1']   ,$route->getCallable()['Controller' ]);
            $this->assertContains($item['2']   ,$route->getCallable()['Method'     ]);
        }
        unset($route);
    }

    /**
     * test de la fonction getCallable() en (sortie) vs $_GET['url'] = ? (en entrée)
     * url: Fausse
     * On s'attends à ce que getCallable retourne Empty
     * @test
     */
    public function VerifyBadRouteGetCallable()
    {
        foreach ($this->badRoutesGetCallable as $item){
            $_GET['url'] = $item;
            $route = new Route;
            self::assertEmpty($route->getCallable());
        }
        unset($route);
    }

    /**
     * test de la fonction postCallable() en (sortie) vs $_POST[$key] = "" (en entrée)
     * Vérifie l'égalité Entrée/Sortie
     * @test
     */
    public function VerifyRoutePostCallable()
    {
        $route = new Route;
        foreach ($route->post as $k => $v){
            $_POST[$k] = [];
            $route = new Route;
            $this->assertEquals($v['0']   ,$route->postCallable()['route']['0']);
            $this->assertEquals($v['1']   ,$route->postCallable()['route']['1']);
        }
        unset($route);
    }

    /**
     * test de la fonction fileCallable() en (sortie) vs $_FILE[$key] = "" et $_POST[$key] = "" (en entrée)
     * Vérifie l'égalité Entrée/Sortie
     * @test
     */
    public function VerifyRouteFileCallable()
    {

        $_FILES = ['createImage' => []];
        $_POST  = ['createImage' => []];
        $route = new Route;
        foreach ($route->files as $k => $v){
            $this->assertEquals($v['0']   ,$route->filesCallable()['route']['0']);
            $this->assertEquals($v['1']   ,$route->filesCallable()['route']['1']);
        }
        unset($_FILES, $_POST, $route);
    }
}
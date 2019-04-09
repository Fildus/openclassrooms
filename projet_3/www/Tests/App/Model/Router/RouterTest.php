<?php
declare(strict_types=1);


namespace Tests\App\Model\Router;


use App\Model\Router\Route;
use PHPUnit\Framework\TestCase;
use App\Model\Router\Router;


class RouterTest extends TestCase
{

    use PathTest;

    /**
     * @test
     */
    public function RouterGetVisitor()
    {
        foreach ($this->routesGetCallable as $item){

            /**
             * Accès aux pages dont $rights === 1
             */
            if ($item['3'] === 1){
                $_SESSION = [];
                $_GET['url'] = $item['0'];
                $router = new Router;
                $this->assertTrue($router->get(( new Route )->getCallable   ()));
            }

            /**
             * Accès aux pages dont $rights > 1
             */
            if ($item['3'] > 1){
                $_SESSION = [];
                $_GET['url'] = $item['0'];
                $router = new Router;
                $this->assertFalse($router->get(( new Route )->getCallable   ()));
            }
        }
        unset($_SESSION,$router);
    }

    /**
     * @test
     */
    public function RouterGetModerator()
    {
        foreach ($this->routesGetCallable as $item){

            $_SESSION = ['id' => 4, 'pseudo' => 'moderateur', 'email' => 'moderateur@moderateur.com', 'rights' => 2];

            /**
             * Accès aux pages dont $rights === 1
             */
            if ($item['3'] <= 2){
                $_GET['url'] = $item['0'];
                $router = new Router;
                $this->assertTrue($router->get( ( new Route )->getCallable() ));
            }

            /**
             * Accès aux pages dont $rights > 2
             */
            if ($item['3'] > 2){
                $_GET['url'] = $item['0'];
                $router = new Router;
                $this->assertFalse($router->get(( new Route )->getCallable   ()));
            }
        }
        unset($_SESSION,$router);
    }

    /**
     * @test
     */
    public function RouterGetAuthor()
    {
        foreach ($this->routesGetCallable as $item){

            $_SESSION = ['id' => 3, 'pseudo' => 'sauteur', 'email' => 'autheur@autheur.com', 'rights' => 3];

            /**
             * Accès aux pages dont $rights === 3
             */
            if ($item['3'] <= 3){
                $_GET['url'] = $item['0'];
                $router = new Router;
                $this->assertTrue($router->get( ( new Route )->getCallable() ));
            }

            /**
             * Accès aux pages dont $rights > 1
             */
            if ($item['3'] > 3){
                $_GET['url'] = $item['0'];
                $router = new Router;
                $this->assertFalse($router->get(( new Route )->getCallable   ()));
            }
        }
        unset($_SESSION,$router);
    }

    /**
     * @test
     */
    public function RouterGetAdmin()
    {
        foreach ($this->routesGetCallable as $item){

            $_SESSION = ['id' => 2, 'pseudo' => 'JeanForteroche', 'email' => 'JeanForteroche@gmail.com', 'rights' => 4];

            /**
             * Accès aux pages dont $rights === 4
             */
            if ($item['3'] <= 4){
                $_GET['url'] = $item['0'];
                $router = new Router;
                $this->assertTrue($router->get( ( new Route )->getCallable() ));
            }

            /**
             * Accès aux pages dont $rights > 4 Aucun assertion pour le moment (4 est le niveau maximum)
             */
            if ($item['3'] > 4){
                $_GET['url'] = $item['0'];
                $router = new Router;
                $this->assertFalse($router->get(( new Route )->getCallable   ()));
            }
        }
        unset($_SESSION,$router);
    }

    /**
     * @test
     */
    public function AllGetPageNotFound()
    {
        foreach ($this->badRoutesGetCallable as $item){

                /**
                * Accès à de fausses url
                */
                $_GET['url'] = $item;
                $router = new Router;
                $this->assertFalse($router->get( ( new Route )->getCallable() ));
        }
        unset($_SESSION,$router);
    }

    /**
     * @test
     */
    public function RouterFileAdmin()
    {
        /**
         * Le Router renvoie Errors::accessDenied()
         */
        $_FILES     = ['img' => ['type' => 'image/jpeg', 'size' => '135461', 'error' => 0, 'name' => 'test', 'tmp_name' => '/tmp/phprVmYme']];
        $_POST      = ['img' => ['id' => 1], 'createImage' => 'Envoyer le fichier'];
        $_SESSION   = ['id' => 2, 'pseudo' => 'JeanForteroche', 'email' => 'JeanForteroche@gmail.com', 'rights' => 1];

        $router = new Router;
        $this->assertFalse($router->file( ( new Route )->filesCallable() ));

        unset($_SESSION,$_POST,$_FILES,$router);

        /**
         * Retourne False car Access:access($rights) renvoie False
         */
        $_FILES     = ['img' => ['type' => 'image/jpeg', 'size' => '135461', 'error' => 0, 'name' => 'test', 'tmp_name' => '/tmp/phprVmYme']];
        $_POST      = ['img' => ['id'], 'createImage' => 'Envoyer le fichier'];
        $_SESSION   = NULL;

        $router = new Router;
        $this->assertFalse($router->file( ( new Route )->filesCallable() ));

        unset($_SESSION,$_POST,$_FILES,$router);
    }

    /**
     * @test
     */
    public function RouterPostAdmin()
    {
        $_POST = ['login' => ['pseudo' => '']];
        $router = new Router;
        $this->assertTrue($router->post( ( new Route )->postCallable() ));

        unset($_SESSION,$_POST,$_FILES,$router);

        $_POST = ['login' => ['pseudo' => 'JeanForteroche', 'password' => 'test']];
        $router = new Router;
        $this->assertTrue($router->post( ( new Route )->postCallable() ));

        unset($_SESSION, $_POST, $_FILES, $router);

        $_POST = ['logout' => []];
        $router = new Router;
        $this->assertTrue($router->post( ( new Route )->postCallable() ));

        unset($_SESSION, $_POST, $_FILES, $router);
    }

    /**
     * @test
     */
    public function RouterPostVisitorFail()
    {
        $_SESSION = NULL;
        foreach (( new Route )->post as $k => $v){
            $_POST = [$k];
            $router = new Router;
            $this->assertFalse($router->post( ( new Route )->postCallable() ));
        }
        unset($_SESSION,$_POST,$_FILES,$router);
    }
}
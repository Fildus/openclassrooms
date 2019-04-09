<?php


namespace App\Model\Manager;
use App\Model\Lib\Twig;


/**
 * Class Logger
 * @package App\Model\Manager
 */
class Logger
{

    private $pdo;

    /**
     * Logger constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param array $data
     * @throws \Exception
     */
    public function login(array $data):void
    {
        $user = (( new Manager )->crud('Users','read',$data)->fetchObject());

        if (empty($_SESSION) OR !isset ($_SESSION)){
            if(!empty($user) AND md5($data['password']) === $user->password){
                $_SESSION = [
                    'id'     => $user->id,
                    'pseudo' => $user->pseudo,
                    'email'  => $user->email,
                    'rights' => $user->rights
                ];
                echo Twig::run()->render('LoginSuccess.twig');
            }else{
                echo Twig::run()->render('LoginFail.twig');
            }
        }else{
            echo Twig::run()->render('LoginAlready.twig');
        }
    }

    public function logout()
    {
        if (isset($_SESSION) AND !empty($_SESSION)){
            session_destroy();
            header("location:");
            echo Twig::run()->render('LogoutSuccess.twig');
        }else{
            echo Twig::run()->render('LogoutFail.twig');
        }
    }
}
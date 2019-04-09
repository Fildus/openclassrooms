<?php


namespace App\Model\Manager;
use App\Model\Lib\Twig;


/**
 * Class Subscribing
 * @package App\Model\Manager
 */
class Subscribing
{

    private $pdo;

    /**
     * Subscribing constructor.
     * @param $pdo
     */
    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
    }

    public function subscribe():void
    {
        if (!empty($_SESSION)){
            echo Twig::run()->render('SubscribeAldreadyConnectedFail.twig');
        }elseif (isset(
            $_POST['subscribe']['username'          ],
            $_POST['subscribe']['password'          ],
            $_POST['subscribe']['password-confirm'  ],
            $_POST['subscribe']['email'             ],
            $_POST['subscribe']['email-confirm'     ]
        )){
            if (
                $_POST['subscribe']['password'] === $_POST['subscribe']['password-confirm'] AND
                $_POST['subscribe']['email'   ] === $_POST['subscribe']['email-confirm'   ]
            ){
                $register = TRUE;
                $user  = ( new Manager )->crud('Users','read', ['pseudo'=> $_POST['subscribe']['username']])->fetchObject();
                $email = ( new Manager )->crud('Users','read', ['email' => $_POST['subscribe']['email'   ]])->fetchObject();

                if (!empty($user->pseudo) AND $_POST['subscribe']['username'] === $user->pseudo)
                {
                    echo Twig::run()->render('SubscribeUsernameExists.twig');
                    $register = FALSE;
                }

                if (!empty($email->email) AND $_POST['subscribe']['email'   ] === $email->email)
                {
                    echo Twig::run()->render('SubscribeEmailExists.twig');
                    $register = FALSE;
                }

                unset($user,$email);

                if ($register === TRUE){
                    ( new Manager )->crud('Users','create', [
                        'pseudo'    => $_POST['subscribe']['username'],
                        'email'     => $_POST['subscribe']['email'],
                        'password'  => md5($_POST['subscribe']['password']),
                        'content'   => NULL,
                        'rights'    => 1
                        ]
                    );
                    echo Twig::run()->render('SubscribeSuccess.twig');
                    ( new Manager )->crud('Loging','login',[
                        'pseudo'    => $_POST['subscribe']['username'],
                        'password'  => $_POST['subscribe']['password']
                    ]);
                    unset($_POST);
                }else{
                    echo Twig::run()->render('SubscribeFail.twig');
                }
            }
        }
    }

    public function unsubscribe():void
    {
        if (isset($_SESSION) AND !empty($_SESSION)){
            if (isset($_SESSION['id'],$_SESSION['pseudo'],$_SESSION['email'],$_SESSION['rights'])){
                ( new Manager )->crud('Users','delete',['id' => $_SESSION['id']]);
                session_destroy();
                echo Twig::run()->render('UnsubscribeSuccess.twig');
            }
        }else{
            echo Twig::run()->render('UnsubscribeFail.twig');
        }
    }
}
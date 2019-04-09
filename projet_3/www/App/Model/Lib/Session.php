<?php


namespace App\Model\Lib;


/**
 * Class Session
 * @package App\Model\Lib
 */
class Session
{
    /**
     * @return array|null
     */
    public function session()
    {
        if (isset($_SESSION) AND !empty($_SESSION)){
            $session = [(object) [
                'id'        => $_SESSION['id'],
                'pseudo'    => $_SESSION['pseudo'],
                'email'     => $_SESSION['email'],
                'rights'    => $_SESSION['rights']
            ]];
        }else{
            $session = NULL;
        }
        RETURN $session;
    }
}
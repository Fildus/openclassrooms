<?php


namespace App\Model\Lib;


use App\Model\Manager\Manager;

/**
 * Trait Account
 * @package App\Model\Lib
 */
trait Account
{

    /**
     * @return session
     * @return null
     */
    private function getAccount()
    {
        if($_SESSION){
            RETURN ( new Manager )->crud('Users','read',['id' => ( new Session )->session()['0']->id]);
        }
        RETURN NULL;
    }
}
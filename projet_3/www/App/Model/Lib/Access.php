<?php


namespace App\Model\Lib;


/**
 * Class Access
 * @package App\Model\Lib
 */
class Access
{
    /**
     * @param int $rights
     * @return bool
     */
    static public function access(int $rights):bool
    {
        if ($rights === 1){
            RETURN TRUE;
        }
        if(isset($_SESSION) AND !empty($_SESSION)){
            if ($_SESSION['rights'] >= $rights){
                RETURN TRUE;
            }
        }
        RETURN FALSE;
    }
}
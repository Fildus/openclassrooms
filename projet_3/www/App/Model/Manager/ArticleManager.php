<?php


namespace App\Model\Manager;


/**
 * Trait ArticleManager
 * @package App\Model\Manager
 */
trait ArticleManager
{

    /**
     * @param array $data
     * @return bool
     */
    public function articleExists(array $data):bool
    {
        $sql = /** @lang fr */ "SELECT COUNT(*) FROM Articles WHERE title = :title";
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':title', $data['title'],\PDO::PARAM_STR);
        $req->execute();
        $nb = $req->fetchColumn();

        if($nb == 0){
            RETURN FALSE;
        }
        RETURN TRUE;
    }

    /**
     * @return mixed
     */
    public function lastArticleId()
    {
        return $this->pdo->lastInsertId();
    }
    
}
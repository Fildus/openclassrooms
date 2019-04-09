<?php


namespace App\Model\Crud;


/**
 * Class Comments
 * @package App\Model\Crud
 */
class Comments
{

    use \App\Model\Lib\CrudFunctions;

    private $pdo;

    /**
     * Comments constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param array $data
     * @return \PDOStatement
     */
    public function create(array $data):\PDOStatement
    {
        $item = $this->createFunction($data);
        RETURN $this->pdo->query("INSERT INTO Comments $item[key] VALUES $item[value]");
    }

    /**
     * @param array $data
     * @return \PDOStatement
     * @throws \Exception
     */
    public function read(array $data):\PDOStatement
    {
        try{
            if(isset($data['id'])){
                $sql = /** @lang fr */ "SELECT * FROM Comments WHERE id = $data[id]";
            }
            if(isset($data['article'])){
                $sql = /** @lang fr */ "
                    SELECT Comments.*,
                           Users.pseudo,
                           Users.content as user_content
                    FROM Comments
                    INNER JOIN Users
                    ON Users.id = Comments.author_id
                    WHERE Comments.article_id = $data[article]";
            }
            if(isset($data['page'])){
                $offset = $data['limit']*$data['page']-$data['limit'];
                $sql = /** @lang fr */ "
                    SELECT
                      Comments.id                 as comment_id,
                      Comments.title              as comment_title,
                      Comments.content            as comment_content,
                      Comments.article_id         as comment_article_id,
                      Comments.parent_id          as comment_parent_id,
                      Comments.creation_date      as comment_creation_date,
                      
                      Articles.id                 as article_id,
                      Articles.title              as article_title,
                    
                      AlertComments.id            as alert_comment_id,
                      AlertComments.content       as alert_comment_content,
                      AlertComments.creation_date as alert_comment_creation_date,
                      
                      Users.id                    as user_id,
                      Users.pseudo                as user_pseudo,
                      Users.email                 as user_email,
                      Users.content               as user_content,
                      Users.creation_date         as user_creation_date,
                      Users.rights                as user_rigths
                    
                    FROM Comments
                    
                    RIGHT JOIN Articles
                    ON Comments.article_id = Articles.id
                    
                    RIGHT JOIN Users
                    ON Comments.author_id = Users.id
                    
                    RIGHT JOIN AlertComments
                    ON Comments.id = AlertComments.comment_id
                    
                    
                    ORDER BY Comments.id LIMIT $data[limit]
                    OFFSET $offset
                ";
            }
            if(isset($data['commentaire'])){
                $sql = /** @lang fr */ "
                    SELECT
                      Comments.id                 as comment_id,
                      Comments.title              as comment_title,
                      Comments.content            as comment_content,
                      Comments.article_id         as comment_article_id,
                      Comments.parent_id          as comment_parent_id,
                      Comments.creation_date      as comment_creation_date,
                      
                      Articles.id                 as article_id,
                      Articles.title              as article_title,
                    
                      Users.id                    as user_id,
                      Users.pseudo                as user_pseudo,
                      Users.email                 as user_email,
                      Users.content               as user_content,
                      Users.creation_date         as user_creation_date,
                      Users.rights                as user_rigths
                    
                    FROM Comments
                    
                    INNER JOIN Users
                    ON Comments.author_id = Users.id
                    
                    INNER JOIN Articles
                    ON Comments.article_id = Articles.id
                    
                    WHERE Comments.id = $data[commentaire]
                ";
            }
        }catch (\Exception $exception){
            throw new \Exception("CRUD Comments, read la lecture du/des commentaire/s n'a pas fonctionné correctement");
        }

        RETURN $this->pdo->query($sql);
    }

    /**
     * @param array $data
     * @return \PDOStatement
     */
    public function update(array $data):\PDOStatement
    {
        $string = $this->updateFunction($data);
        RETURN $this->pdo->query("UPDATE Comments SET $string WHERE id = $data[id]");
    }

    /**
     * @param $data
     * @return mixed
     */
    public function delete($data)
    {
        RETURN $this->deleteFunction('Comments',$data);
    }
}
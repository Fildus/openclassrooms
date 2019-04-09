<?php


namespace App\Model\Crud;


/**
 * Class AlertComments
 * @package App\Model\Crud
 */
class AlertComments
{
    use \App\Model\Lib\CrudFunctions;

    private $pdo;

    /**
     * AlertComments constructor.
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
        RETURN $this->pdo->query("INSERT INTO AlertComments $item[key] VALUES $item[value]");
    }

    /**
     * @param array $data
     * @return \PDOStatement
     */
    public function read(array $data):\PDOStatement
    {
        if (key($data) === 'comment_id') {
            $sql = /** @lang fr */
                "SELECT * FROM AlertComments WHERE comment_id = $data[comment_id]";
        } elseif (isset($data['range'], $data['limit'])) {
            $offset = $data['limit'] * $data['range'] - $data['limit'];
            $sql = /** @lang fr */
                "SELECT * FROM AlertComments ORDER BY id LIMIT $data[limit] OFFSET $offset";
        }elseif (key($data) === 'commentaire'){
            $sql = /** @lang fr */
                "SELECT * FROM AlertComments WHERE comment_id = $data[commentaire]";
        }else{
            $sql = /** @lang fr */ "SELECT * FROM AlertComments ORDER BY creation_date";
        }
        return $this->pdo->query($sql);
    }

    /**
     * @param array $data
     * @return \PDOStatement
     */
    public function update(array $data):\PDOStatement
    {
        $string = $this->updateFunction($data);
        RETURN $this->pdo->query("UPDATE AlertComments SET $string WHERE id = $data[id]");
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function delete(array $data):mixed
    {
        RETURN $this->deleteFunction('AlertComments',$data);
    }
}
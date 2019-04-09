<?php


namespace App\Model\Crud;


/**
 * Class Chapters
 * @package App\Model\Crud
 */
class Chapters
{

    use \App\Model\Lib\CrudFunctions;

    private $pdo;

    /**
     * Chapters constructor.
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
        $sql = /** @lang fr  */ "INSERT INTO Chapters $item[key] VALUES $item[value]";

        RETURN $this->pdo->query($sql);
    }

    /**
     * @param array $data
     * @return \PDOStatement
     */
    public function read(array $data):\PDOStatement
    {
        if(array_key_exists('chapitre',$data)){
            $sql = /** @lang fr */ "SELECT * FROM Chapters WHERE id = $data[chapitre]";
        }elseif (array_key_exists('page',$data)){
            $offset = $data['limit']*$data['page']-$data['limit'];
            $sql = /** @lang fr */
            "
            SELECT * FROM Chapters
            ORDER BY Chapters.id LIMIT $data[limit] OFFSET $offset
            ";
        }else{
            $sql = /** @lang fr */ "SELECT * FROM Chapters";
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
        RETURN $this->pdo->query("UPDATE Chapters SET $string WHERE id= $data[id]");
    }

    /**
     * @param array $data
     * @return \PDOStatement
     */
    public function delete(array $data):\PDOStatement
    {
        RETURN $this->deleteFunction('Chapters',$data);
    }
}
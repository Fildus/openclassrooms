<?php


namespace App\Model\Crud;


/**
 * Class Articles
 * @package App\Model\Crud
 */
class Articles
{

    use \App\Model\Lib\CrudFunctions;


    private $pdo;

    /**
     * Articles constructor.
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
        RETURN $this->pdo->query("INSERT INTO Articles $item[key] VALUES $item[value]");
    }

    /**
     * @param array $data
     * @return \PDOStatement
     */
    public function read(array $data):\PDOStatement
    {
        $sql = /** @lang fr */
        "SELECT 
            Articles.*,
            Chapters.name as chapter_name
            FROM Articles
            LEFT JOIN  Chapters
            ON Articles.chapter_id = Chapters.id
            WHERE Chapters.id = $data[chapter]
            ORDER BY Articles.id
        ";
        return $this->pdo->query($sql);
    }

    /**
     * @param array $data
     * @return \PDOStatement
     */
    public function update(array $data):\PDOStatement
    {
        $string = $this->updateFunction($data);
        RETURN $this->pdo->query("UPDATE Articles SET $string WHERE id = $data[id]");

    }

    /**
     * @param array $data
     * @return \PDOStatement
     */
    public function delete(array $data):\PDOStatement
    {
        RETURN $this->deleteFunction('Articles',$data);
    }
}
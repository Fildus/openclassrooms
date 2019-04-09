<?php


namespace App\Model\Crud;


/**
 * Class Users
 * @package App\Model\Crud
 */
class Users
{

    use \App\Model\Lib\CrudFunctions;

    private $pdo;

    /**
     * Users constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
    }

    /**
     * @param array $data
     * @return \PDOStatement
     */
    public function create(array $data):\PDOStatement
    {
        $item = $this->createFunction($data);
        RETURN $this->pdo->query("INSERT INTO Users $item[key] VALUES $item[value]");
    }

    /**
     * @param array $data
     * @return \PDOStatement
     * @throws \Exception
     */
    public function read($data):\PDOStatement
    {
        try{
            if(key($data) === 'id') {
                $sql = /** @lang fr */ "SELECT * FROM Users WHERE id = $data[id]";
            }elseif(key($data) === 'range'){
                $offset = $data['limit']*$data['range']-$data['limit'];
                $sql = /** @lang fr */ "SELECT * FROM Users ORDER BY id LIMIT $data[limit] OFFSET $offset";
            }elseif (key($data) === 'pseudo'){
                $sql = /** @lang fr */ "SELECT * FROM Users WHERE pseudo = '$data[pseudo]'";
            }elseif (key($data) === 'email'){
                $sql = /** @lang fr */ "SELECT * FROM Users WHERE email = '$data[email]'";
            }
        }catch(\Exception $exception){
            throw new \Exception("CRUD USERS, read, la lecture d'un/plusieurs utilisateur/s a échoué");
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
        RETURN $this->pdo->query("UPDATE Users SET $string WHERE id= $data[id]");
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function delete($data)
    {
        RETURN $this->deleteFunction('Users',$data);
    }
}
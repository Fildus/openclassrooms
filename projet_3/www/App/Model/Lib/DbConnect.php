<?php


namespace App\Model\Lib;
use PDOException;
use \PDO;

/**
 * Trait DbConnect
 * @package App\Model\Lib
 */
trait DbConnect{

    private $pdo;

	private $_db = 'blog';
	private $_host = 'localhost';
	private $_user = 'root';
	private $_password = 'beepbeep';

    /**
     * @return PDO
     */
    public function getPDO()
    {
		try
		{
			$pdo = new PDO("mysql:dbname=$this->_db;host=$this->_host","$this->_user","$this->_password");
			$pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
			$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			$this->pdo = $pdo;
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}
}
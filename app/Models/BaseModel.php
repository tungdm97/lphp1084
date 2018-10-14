<?php
namespace App\Models;
use PDO;
include './app/Commons/DB_Config.php';
/**
* 
*/
class BaseModel
{
	public $connection;
	
	function __construct()
	{
		try {
			$this->connection = new PDO(
				'mysql:host=' . APP_HOST . ';dbname=' . APP_DBNAME,
				APP_DBUSERNAME,
				APP_DBPASSWORD
			);
			$this->connection->setAttribute(
				PDO::ATTR_ERRMODE, 
				PDO::ERRMODE_EXCEPTION
			);
		} catch (PDOException $e) {
			echo ("Cannot connect to DB " . $e->getMessage());
		}
	}

	public function getConnection()
	{
		// Chuyen try catch vao thang __construct() de chay ngay khi khoi tao
	}

	public function where($array = [])
	{
		if (count($array) > 0) {
			$this->query = $this->query 
				. ' where '
				. $array[0] . ' '
				. $array[1] . ' '
				. $array[2] . ' ';
		} else {
			echo "Cannot Where Query";
		}

		return $this;

	}

	public function getAll()
	{
		// $this->query nhan duoc khi return $model o find(), $this chinh la Model
		// Neu khong prepare duoc thi se them parent::__construct() o doi tuong con goi den
		$queryData = $this->connection->prepare($this->query);
		$queryData->setFetchMode(PDO::FETCH_CLASS, get_class($this));
		$queryData->execute();
		$result = $queryData->fetchAll();

		return $result;
	}

	public function getOne()
	{
		$queryData = $this->connection->prepare($this->query);
		$queryData->setFetchMode(PDO::FETCH_CLASS, get_class($this));
		$queryData->execute();
		$result = $queryData->fetch();

		return $result;
	}
}
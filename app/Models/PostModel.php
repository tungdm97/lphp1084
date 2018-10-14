<?php
namespace App\Models;
use App\Models\BaseModel;

class PostModel extends BaseModel
{
	public $query;
	
	function __construct()
	{
		parent::__construct();
	}

	public static function tableName()
	{
		return 'posts';
	}

	public function find($id = NULL)
	{
		$model = new PostModel();
		// if ($id != NULL) {
		// 	$model->query = 'SELECT * FROM ' . self::tableName() . ' WHERE ' . $id . '= id';
		// } else {
		// 	$model->query = 'SELECT * FROM ' . self::tableName();
		// }
		$model->query = 'SELECT * FROM ' . self::tableName();

		return $model;
	}

	// Neu dung find thi khong can nua
	public function getAllPost()
	{
		$base = new BaseModel();
		// $base->getConnection();

		$query = 'SELECT * FROM ' . PostModel::tableName();
		$queryData = $base->connection->prepare($query);
		$queryData->setFetchMode(PDO::FETCH_CLASS, PostModel::class);
		$queryData->execute();

		$posts = $queryData->fetchAll();

		return $posts;
	}
	// Neu dung find thi khong can nua
	public function getOnePost($id)
	{
		// Khoi tao Doi tuong BaseModel va chay __construct() cua BaseModel
		$base = new BaseModel();
		// Ket noi thuc hien ngay o construct ma khong can goi 
		// $base->getConnection();

		$query = 'SELECT * FROM ' 
			. PostModel::tableName() 
			. ' WHERE ' . $id . ' = id';
		$queryData = $base->connection->prepare($query);
		$queryData->setFetchMode(PDO::FETCH_CLASS, PostModel::class);
		$queryData->execute();

		$post = $queryData->fetch();

		return $post;
	}
}
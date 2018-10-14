<?php
include 'BaseModel.php';
/**
 * 
 */
class CategoryModel extends BaseModel
{
	
	function __construct()
	{
		# code...
	}

	public static function tableName()
	{
		return 'categories';
	}

	public function getAllCategory()
	{
		$base = new BaseModel();
		// $base->getConnection();

		$query = 'SELECT * FROM ' . CategoryModel::tableName();
		$queryData = $base->connection->prepare($query);
		$queryData->setFetchMode(PDO::FETCH_CLASS, CategoryModel::class);
		$queryData->execute();

		$categories = $queryData->fetchAll();

		return $categories;
	}

	public function getOneCategory($id)
	{
		$base = new BaseModel();
		// $base->getConnection();

		$query = 'SELECT * FROM ' 
			. CategoryModel::tableName() 
			. ' WHERE ' . $id . ' = id';
		$queryData = $base->connection->prepare($query);
		$queryData->setFetchMode(PDO::FETCH_CLASS, CategoryModel::class);
		$queryData->execute();

		$category = $queryData->fetch();

		return $category;
	}
}
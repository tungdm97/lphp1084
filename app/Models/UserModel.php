<?php 
namespace App\Models;
use App\Models\BaseModel;

/**
* 
*/
class UserModel extends BaseModel
{
	
	function __construct(){
		parent::__construct();
	}
	public function tableName(){
		return 'user';
	}
	public function find($id = NULL)
	{
		$model = new UserModel();
		$model->query = 'SELECT * FROM ' . self::tableName();
		return $model;
	}
}
 ?>
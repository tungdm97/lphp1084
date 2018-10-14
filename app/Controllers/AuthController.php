<?php 
/**
* 
*/
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;
class AuthController extends BaseController
{
	
	function __construct()
	{
		# code...
	}
	public function getLogin()
	{
		return $this->render('login.login');
	}
	public function postLogin(){
		$user = new UserModel();
		$user->find()->where(['username','=',$_POST["username"]])
					->getOne();
				if($user && $user['password'] == $_POST['password']){
					$_SESSION['user_info'] = ['user_id' => $user['id'], 'pwd' => $user['password']]; 
					header('Location: admin');
				} else{
					return $this->render('login.login',['msg'=>'khong thanh cong']);
				}
	}
}
 ?>
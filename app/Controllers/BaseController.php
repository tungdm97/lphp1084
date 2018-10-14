<?php
namespace App\Controllers;
use Jenssegers\Blade\Blade;
/**
* 
*/
class BaseController
{
	public function render($filename,$variables  = []){
		$view = new Blade('app/View','storage');
		echo $view->make($filename,$variables)->render();
	}
}
<?php
namespace Routes;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
/**
* 
*/
class CustomRoutes
{
	public static function initRoute()
	{
		$url = isset($_GET['redirect']) ? $_GET['redirect'] : '/';

		// var_dump($url);	
		// Khoi tao RouteCollector	
		$collector = new RouteCollector();
		//Neu phuong thuc la get(duong dan, mang[controller, ten ham trong controller]);
		$collector->get('/', ["App\Controllers\HomeController", "index"]);
		$collector->get('/admin', ["App\Controllers\AdminController", "index"]);
		$collector->get('/login', ["App\Controllers\AuthController", "getLogin"]);
		$collector->post('/login', ["App\Controllers\AuthController", "postLogin"]);

		$collector->get('error', function() {
			return "Not found!";
		});
		$collector->get('post', function() {
			return "List post";
		});
		//Khoi tao bien $dispatcher, truyen vao data cua $collector
		$dispatcher = new Dispatcher($collector->getData());
		// Phat ra doan xu ly
		echo $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);
	}
	
}

<?php

defined('ROOT') or die('<font face="arial" size="5" color="red"><b>Geeky Warning:</b> Direct script access is prohibited !</font>');

class Router{

	public static function route($url){

		// Extracting Controller Name
		$controller = (isset($url[0]) && $url[0] != '') ? ucwords($url[0]) : DEFAULT_CONTROLLER;
		$controller_name = $controller;
		array_shift($url);

		// Extracting Action or Method Name
		$action = (isset($url[0]) && $url[0] != '') ? $url[0] : 'index';
		$action_name = $action;
		array_shift($url);

		//  Extracting URL Parameters
		$urlParams = $url;

		// Instantiating the required controller
		if(class_exists($controller)){
			$dispatch = new $controller($controller_name, $action);
		}else{
			die('<p style="background:#ccc;font-size:25px;color:red;padding:20px;border-left:7px solid red;margin:0 auto;font-family:Arial;display:inline-block;">Controller Error: <b>' . $controller . '</b> class does not exist.</p>');
		}

		if(method_exists($dispatch, $action)){
			call_user_func_array([$dispatch, $action], [$urlParams]);
		}else{
			die('<p style="background:#ccc;font-size:25px;color:red;padding:20px;border-left:7px solid red;margin:0 auto;font-family:Arial;display:inline-block;">Controller Action Error: <b>' . $action_name . '</b> method does not exist in <b>' . $controller_name . '</b> controller</p>');
		}
	}
}
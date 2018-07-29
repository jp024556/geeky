<?php

defined('ROOT') or die('<font face="arial" size="5" color="red"><b>Geeky Warning:</b> Direct script access is prohibited !</font>');

class View{

	public $template;

	public function __construct(){
		$this->template = new Geeky_Template();
	}

	public function render($view, $data = [], $template = NULL){
		$template = $this->template;
		$viewPath = explode('/', $view);
		$viewPath = implode(DS, $viewPath);
		if(file_exists(ROOT . DS . 'app' . DS . 'views' . DS . $viewPath . '.php')){
			include(ROOT . DS . 'app' . DS . 'views' . DS . $viewPath . '.php');
		}else{
			die('<div style="font-family:Tahoma;font-size:17px;background:red;color:white;padding:10px;display:inline-block;">View Error: <b>' . $viewPath . '.php</b> does not exist in views directory.</div>');
		}
	}

}
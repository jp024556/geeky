<?php

defined('ROOT') or die('<font face="arial" size="5" color="red"><b>Geeky Warning:</b> Direct script access is prohibited !</font>');

class Controller extends Application{

	protected $controller, $action, $input;
	public $view;

	public function __construct($controller, $action){
		parent::__construct();
		$this->controller = $controller;
		$this->action = $action;
		$this->input = new Application();
		$this->view = new View();
	}

}
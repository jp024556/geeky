<?php

defined('ROOT') or die('<font face="arial" size="5" color="red"><b>Geeky Warning:</b> Direct script access is prohibited !</font>');

class Test extends Model{
	protected $model;

	public function __construct(){
		$this->model =  new Model();
	}

	public function getUsers(){
		return $this->model->select('users');
	}
}
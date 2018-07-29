<?php 
defined('ROOT') or die('<font face="arial" size="5" color="red"><b>Geeky Warning:</b> Direct script access is prohibited !</font>');

class Home extends Controller{

	public function index($param){
		$this->view->render('geeky');
	}

	public function about($param){
		$this->view->render('about');
	}

}
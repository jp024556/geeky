<?php

class Geeky_Template{

	// Bootstrap Templating System
	public function startHead(){
		if(file_exists(ROOT . DS . 'core' . DS . 'templates' . DS . 'header.php')){
			include(ROOT . DS . 'core' . DS . 'templates' . DS . 'header.php');
		}else{
			die('<div style="font-family:Tahoma;font-size:17px;background:red;color:white;padding:10px;display:inline-block;">Template Error: <b> Missing template files !</div>');
		}
	}

	public function endHead(){
		echo '</head>';
	}

	public function startBody(){
		echo '<body>';
	}

	public function endBody(){
		if(file_exists(ROOT . DS . 'core' . DS . 'templates' . DS . 'footer.php')){
			include(ROOT . DS . 'core' . DS . 'templates' . DS . 'footer.php');
		}else{
			die('<div style="font-family:Tahoma;font-size:17px;background:red;color:white;padding:10px;display:inline-block;">Template Error: <b> Missing template files !</div>');
		}
	}
}
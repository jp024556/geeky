<?php

class DB{

	private static $instance = null;
	public $conn;

	private function __construct(){
		if(@!$this->conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE)){
			die("<div style='background:red;padding:20px;width:50%;margin:5px auto;font-family:Verdana;color:#fff;box-shadow:0px 3px 10px #ccc;font-size:17px;'><b>Geeky Warning(DB): </b>".mysqli_connect_error()."</div>");
		}
	}

	public static function getInstance(){
		if(!isset(self::$instance)){
			self::$instance = new DB();
		}

		return self::$instance;
	}
}

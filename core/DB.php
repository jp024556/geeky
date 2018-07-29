<?php

class DB{

	private static $instance = null;
	public $conn;

	private function __construct(){
		$this->conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
		if(!$this->conn){
			return mysqli_connect_error();
		}
	}

	public static function getInstance(){
		if(!isset(self::$instance)){
			self::$instance = new DB();
		}

		return self::$instance;
	}
}
<?php

defined('ROOT') or die('<font face="arial" size="5" color="red"><b>Geeky Warning:</b> Direct script access is prohibited !</font>');

class Model{
	protected $model;

	protected function select($tablename = NULL){
		if($tablename !== NULL){
			$query = "SELECT * FROM `".$tablename."`";
			$runQuery = mysqli_query(DB::getInstance()->conn, $query);
			while($result = mysqli_fetch_assoc($runQuery)){
				return $resultset[] = $result;
			}
		}
	}
}
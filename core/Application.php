<?php

defined('ROOT') or die('<font face="arial" size="5" color="red"><b>Geeky Warning:</b> Direct script access is prohibited !</font>');

class Application{

private $getArray, $postArray;
public $sess, $files, $uploadedFileNames;

	public function __construct(){
		$this->_set_debug_mode();
		$this->_unregister_globals();
		$this->getArray = $_GET;
		$this->postArray = $_POST;
		$this->sess = $_SESSION;
		$this->files = $_FILES;
		$this->uploadedFileNames = [];
	}

	// Setting or Unsetting debugging mode as provided in the config file
	private function _set_debug_mode(){
		if(DEBUG){
			error_reporting(E_ALL);
			ini_set('display_errors', 1);
		}else{
			error_reporting(0);
			ini_set('display_errors', 0);
			ini_set('log_errors', 1);
			ini_set('error_log', ROOT . DS . 'tmp' . DS . 'logs' . DS . 'geekyErrors.log');
		}
	}

	// Unregistering globals to sanitize security threat
	private function _unregister_globals(){
		if(ini_get('register_globals')){
			$globalArray = ['_SESSION', '_COOKIE', '_POST', '_GET', '_REQUEST', '_SERVER', '_FILES', '_ENV'];
			foreach($globalArray as $g){
				foreach ($GLOBALS[$g] as $k => $v) {
					if($GLOBALS[$K] === $v){
						unset($GLOBALS[$K]);
					}
				}
			}
		}
	}

	// Extracting GET form variables
		protected function getForm($k = NULL){

		$data = NULL;

		if(!empty($this->getArray)){
			foreach ($this->getArray as $key => $value) {
				if($key === $k){
					$data = $value;
				}
			}
			return mysqli_real_escape_string(DB::getInstance()->conn, $data);
		}else{
			return $data;
		}
	}

	// Extracting POST form variables
		protected function postForm($k = NULL){

		$data = NULL;

		if(!empty($this->postArray)){
			foreach ($this->postArray as $key => $value) {
				if($key === $k){
					$data = $value;
				}
			}
			return mysqli_real_escape_string(DB::getInstance()->conn, $data);
		}else{
			return $data;
		}
	}

	// Setting up session variables
	protected function setSession($data = []){
		if(!empty($data)){
			$this->sess = [];
			foreach($data as $sessKey => $sessVal){
				$_SESSION[$sessKey] = $sessVal;
			}
			$this->sess = $_SESSION;
		}
	}

	// Destroying session data
	protected function sessDestroy(){
		if(isset($this->sess)){
			unset($this->sess);
		}
		session_unset();
		session_destroy();
	}

	// Destroying individual sessin value
	protected function delSession($data = []){
		if(!empty($data)){
			foreach($data as $key){
				$this->sess[$key] = NULL;
				$_SESSION[$key] = NULL; 
			}
		}
	}

	// Get all session data
	protected function getSession(){
		if(isset($this->sess)){
			return $this->sess;
		}
	}

	//Function to manually load a class
	protected function load($className = NULL){
		if($className !== NULL){
			return new $className();
		}
	}

	//File upload helper function
	protected function uploadFiles($fileNames = [], $uploadLocation = FILE_UPLOAD_LOCATION){
		if(!empty($fileNames) && $uploadLocation !== NULL){
			if(is_writable($uploadLocation)){
				$count = 0;
				foreach($fileNames as $fileName){
					if(is_array($this->files[$fileName]['name'])){
						$total_files = count($this->files[$fileName]['name']);
						for ($i=0; $i < $total_files; $i++) { 
							$ext = explode('.', $this->files[$fileName]['name'][$i]);
							$ext = end($ext);
							$newFileName = str_ireplace('.' . $ext, '', $this->files[$fileName]['name'][$i]) . '_' .uniqid(true) . '_.' .$ext;
							if(move_uploaded_file($this->files[$fileName]['tmp_name'][$i], $uploadLocation.$newFileName)){
								$count++;
								array_push($this->uploadedFileNames, $newFileName);
							}
						}
					}else{
						$ext = explode('.', $this->files[$fileName]['name']);
						$ext = end($ext);
						$newFileName = str_ireplace('.' . $ext, '', $this->files[$fileName]['name']) . '_' .uniqid(true) . '_.' .$ext;
						if(move_uploaded_file($this->files[$fileName]['tmp_name'], $uploadLocation.$newFileName)){
							$count++;
							array_push($this->uploadedFileNames, $newFileName);
						}
					}
				}
				if(count($fileNames) <= $count){
					return TRUE;
				}else{
					return FALSE;
				}
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}


}
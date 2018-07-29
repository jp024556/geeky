<?php

defined('ROOT') or die('<font face="arial" size="5" color="red"><b>Geeky Warning:</b> Direct script access is prohibited !</font>');

// Debug and Die function
function dnd($dumpData = NULL){
	echo '<pre>';
	var_dump($dumpData);
	echo '</pre>';
	die();
}

// This function will dump error logs if there is one
function dumpLog($path = ROOT . DS . 'tmp' . DS . 'logs' . DS . 'geekyErrors.log'){
	echo '<p style="background:#ccc;font-size:25px;color:red;padding:20px;border-left:7px solid red;margin:0 auto;font-family:Arial;display:inline-block;"><b>Geeky Error Log: </b>Showing error logs of Geeky(<small>If any available</small>).<br /></b>Currently looking in: </b><mark>'.$path.'</mark></p><br />';
	echo '<div style="background:#ccc;font-size:14px;padding:20px;border-left:7px solid red;margin:0 auto;font-family:Arial;display:inline-block;"><pre>'.file_get_contents($path).'</pre></div>';
	die();
}

// Redirect Function
function redirect($location = ''){
	if($location !== ''){
		header("Location: ".BASE_URI.$location);
		exit();
	}else{
		return FALSE;
	}
}

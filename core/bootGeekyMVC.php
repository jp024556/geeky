<?php

defined('ROOT') or die('<font face="arial" size="5" color="red"><b>Geeky Warning:</b> Direct script access is prohibited !</font>');

// Laoding Configuration And Helper Functions
require_once(ROOT . DS . 'config' . DS . 'config.php');
require_once(ROOT . DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'functions.php');

// Autoloading classes
spl_autoload_register('geekyAutoLoader');

function geekyAutoLoader($className)
{
    if(file_exists(ROOT . DS . 'core' . DS . $className . '.php')){
    	require_once(ROOT . DS . 'core' . DS . $className . '.php');
    }elseif(file_exists(ROOT . DS . 'app' . DS . 'controllers' . DS . $className . '.php')){
    	require_once(ROOT . DS . 'app' . DS . 'controllers' . DS . $className . '.php');
    }elseif(file_exists(ROOT . DS . 'app' . DS . 'models' . DS . $className . '.php')){
    	require_once(ROOT . DS . 'app' . DS . 'models' . DS . $className . '.php');
    }elseif(file_exists(ROOT . DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'helper-classes' . DS . $className . '.php')){
    	require_once(ROOT . DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'helper-classes' . DS . $className . '.php');
    }
}

// Initializing Database Connection
$DBInstance = DB::getInstance();
//$conn = $DBInstance->conn;

// Routing the requests
Router::route($url);
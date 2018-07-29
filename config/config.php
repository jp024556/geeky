<?php

defined('ROOT') or die('<font face="arial" size="5" color="red"><b>Geeky Warning:</b> Direct script access is prohibited !</font>');

define('DEBUG', TRUE); // Set to FALSE for production environment

define('DEFAULT_CONTROLLER', 'Home'); // Default controller in case if it's not provided in url param

define('DEFAULT_TIMEZONE', 'Asia/Kolkata'); // Set Default timezone for your region

define('BASE_URI', 'http://localhost/geeky/'); // SET this to your project root directory eg.:- http://localhost/geeky/

///////////////////////////////////////////////////////
// Database Constants
// @param HOST
// @param USERNAME
// @param PASSWORD
// @param DATABASE
///////////////////////////////////////////////////////

define('HOST', '127.0.0.1');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'udemy');

//////////////////////////////////////////////////////////

define('SITE_TITLE', 'GEEKY MVC Framework');

define('FILE_UPLOAD_LOCATION', ROOT . DS . 'geeky_uploads' . DS);
<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT',  realpath(dirname(__FILE__)).DS);
define('CORE',ROOT.'core'.DS);
define('APP_CONTROLLERS',ROOT.'controllers'.DS);
define('APP_VIEWS',ROOT.'views'.DS);
require_once CORE.'mvc.php';



<?php
ini_set('include_path', '/var/www/lib'); 
require_once 'dpr.php';
include_once 'apache-log4php-2.3.0/src/main/php/Logger.php';
Logger::configure('resources/appender_dailyfile.properties');
$logger = Logger::getRootLogger();

if (!session_id())
	session_start();

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "epsilon1");
define("DB_DEFAUTL", "py-farm");

?>

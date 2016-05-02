<?php
if (!session_id())
	session_start();
ini_set('memory_limit', '-1');
if (PHP_OS == "Linux") {
	ini_set('include_path', '/var/www/lib'); 
}else{
	ini_set('include_path', 'C:\\AppServ\\www\\lib'); 
}
require_once 'dpr.php';
include_once 'apache-log4php-2.3.0/src/main/php/Logger.php';
Logger::configure('resources/appender_dailyfile.properties');
$logger = Logger::getRootLogger();


define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "epsilon1");
define("DB_DEFAUTL", "py-farm");

?>

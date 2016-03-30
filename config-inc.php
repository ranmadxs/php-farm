<?php 
require_once 'src/utils/dpr.php';
ini_set('include_path', '/var/www/lib');

if (!session_id())
	session_start();

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DEFAUTL", "py-farm");

?>

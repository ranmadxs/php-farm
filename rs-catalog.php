<?php 
require_once 'config-inc.php';
include_once 'restFast/RestFast.php';
include_once 'src/cl.phpfarm.rs/CalendarEventRS.php';

$dirRF = new RestFast();
$dirRF->setClass(array("CalendarEventRS"));
$dirRF->handle();

?>
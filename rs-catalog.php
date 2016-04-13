<?php 
require_once 'config-inc.php';
include_once 'restFast/RestFast.php';
include_once 'src/cl.phpfarm.rs/CalendarEventRS.php';

$logger->info("Inicio carga svc Rest");

$dirRF = new RestFast();
$dirRF->setClass(array("CalendarEventRS"));
$dirRF->handle();

?>
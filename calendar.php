<?php
require_once 'config-inc.php';
include_once("smarty-cfg.php");
include_once 'smarty/Smarty.class.php';
require_once('./src/utils/SimpleCalendar.php');

$smarty = new Smarty();
smartyTemplate($smarty, "./");

#criteria
include_once 'phpCriteria/Criteria.php';
include_once 'src/cl.phpfarm.model/EntityCalendar_event.php';
include_once 'src/cl.phpfarm.svc/CalendarEventSvc.php';

$logger->info("Carga de calendar");
$mes = ($_GET["mes"]> 0)?$_GET["mes"]:date("m");
$anio = ($_GET["anio"] > 0)?$_GET["anio"]:date("Y");
$fechaCalendario = $anio."-".$mes;
echo 'Fecha consulta:'. $fechaCalendario.'<br/>';

$calendarSvc = new CalendarEventSvc();
$lista = $calendarSvc->getListEventByMes($mes, $anio);

//$calendar = new donatj\SimpleCalendar();
$calendar = new SimpleCalendar($fechaCalendario);

$calendar->setStartOfWeek('Monday');

$calendar->addDailyHtml( '<u><i>Sample</i></u> <b>Event</b>', 'today', 'tomorrow' );
foreach ($lista as $calendarEvent){
	$calendar->addDailyHtml($calendarEvent["nombre"], $calendarEvent["fecha"], null, $calendarEvent["id"]);	
}

$calendar->addDailyHtml('Prueba23', '2016-03-27');
$calendar->show(true, $smarty);
//echo "<br/>";
//$calendar->show(true);
?>

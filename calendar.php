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
include_once './src/cl.phpfarm.svc/TemperaturaSvc.php';
include_once './src/cl.phpfarm.model/EntityTemperatura.php';
include_once './src/cl.phpfarm.svc/LuzSvc.php';
include_once './src/cl.phpfarm.model/EntityLuz.php';

$logger->info("Carga de calendar");
$mes = ($_GET["mes"]> 0)?$_GET["mes"]:date("m");
$anio = ($_GET["anio"] > 0)?$_GET["anio"]:date("Y");
$fechaCalendario = $anio."-".$mes;
echo 'Fecha consulta:'. $fechaCalendario.'<br/>';

//$calendar = new donatj\SimpleCalendar();
$calendar = new SimpleCalendar($fechaCalendario);

$calendar->setStartOfWeek('Monday');

$calendarSvc = new CalendarEventSvc();
$lista = $calendarSvc->getListEventByMes($mes, $anio);
//$litAux = $calendarSvc->listTiposEventos();
//dpr($litAux);
$temperaturaSvc = new TemperaturaSvc();
$lstTemperatura = $temperaturaSvc->listMaxMinByMes($mes, $anio);
foreach ($lstTemperatura as $temperatura){
    $strTemperatura = "T:".$temperatura["maxTemperatura"]."&deg; / ".$temperatura["minTemperatura"]."&deg; &nbsp; "
            . "H:".$temperatura["maxHumedad"]."% / ".$temperatura["minHumedad"]."%";
    $calendar->addDailyHtml($strTemperatura, $temperatura["fecha"], null, null, "temperatura");	
}

$luzSvc = new LuzSvc();
$lstLuz = $luzSvc->listCountLuzByMes($mes, $anio);
foreach ($lstLuz as $luz){
    $strLuz = "".$luz["luz"]." [Hrs] / ".$luz["oscuridad"] ." [Hrs]";
    $calendar->addDailyHtml($strLuz, $luz["fecha"], null, null, "luz");	
}

foreach ($lista as $calendarEvent){
    $calendar->addDailyHtml($calendarEvent["nombre"], $calendarEvent["fecha"], null, $calendarEvent["id"], $calendarEvent["tipo"]);	
}

//$calendar->addDailyHtml('Prueba23', '2016-03-27');
$calendar->show(true, $smarty);
//echo "<br/>";
//$calendar->show(true);
?>

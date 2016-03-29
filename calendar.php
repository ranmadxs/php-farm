<html>
<head><link rel="stylesheet" href="./css/SimpleCalendar.css" /></head>
<body>
<?php

require_once 'config-inc.php';
require_once('./src/utils/SimpleCalendar.php');

#criteria
include_once 'phpCriteria/Criteria.php';
include_once 'src/cl.phpfarm.model/EntityCalendar_event.php';
include_once 'src/cl.phpfarm.svc/CalendarEventSvc.php';

$calendarSvc = new CalendarEventSvc();
$lista = $calendarSvc->getListEventByMes(3, 2016);

$calendar = new donatj\SimpleCalendar();
//$calendar = new donatj\SimpleCalendar('2016-03');

$calendar->setStartOfWeek('Monday');

$calendar->addDailyHtml( '<u><i>Sample</i></u> <b>Event</b>', 'today', 'tomorrow' );
foreach ($lista as $calendarEvent){
	$calendar->addDailyHtml($calendarEvent["nombre"], $calendarEvent["fecha"]);	
}

$calendar->addDailyHtml('Prueba23', '2016-03-27');
$calendar->show(true);
?>
</body>
</html>

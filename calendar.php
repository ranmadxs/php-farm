<html>
<head><link rel="stylesheet" href="./css/SimpleCalendar.css" /></head>
<body>
<?php
echo strtotime("now"), "\n";
echo strtotime("4 March 2016"), "\n";
echo strtotime("2016-3-4"), "<br />";
echo strtotime("+1 week"), "\n";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
echo strtotime("next Thursday"), "\n";
echo strtotime("last Monday"), "\n";


error_reporting(E_ALL ^ E_WARNING);
require_once('./lib/SimpleCalendar.php');

$calendar = new donatj\SimpleCalendar();

$calendar->setStartOfWeek('Monday');

$calendar->addDailyHtml( '<u><i>Sample</i></u> <b>Event</b>', 'today', 'tomorrow' );
$calendar->addDailyHtml('Pruebita', '27 March 2016');
$calendar->addDailyHtml('Prueba23', '2016-03-27');
$calendar->show(true);
?>
</body>
</html>

<?php
require_once 'config-inc.php';
include_once 'PHPBind.php';
include_once("smarty-cfg.php");
include_once 'smarty/Smarty.class.php';
include_once 'src/cl.phpfarm.svc/CalendarEventSvc.php';
include_once 'src/cl.phpfarm.model/EntityCalendar_event.php';

$smarty = new Smarty();
smartyTemplate($smarty, "./");

$eventController = new EventController();

if (isset($_GET['action'])) {

    switch ($_GET['action']) {
        case 'addEvent':
            $eventController->addEvent($smarty);
            break;

        default:
            break;
    }
}
if (isset($_POST['action'])) {

    switch ($_POST['action']) {
        case 'saveEvent':
            $eventController->saveEvent();
            break;

        default:
            break;
    }
}

class EventController {

    var $calendarEventSvc;
    
    function __construct() {
        $this->logger = Logger::getRootLogger();
        $this->calendarEventSvc = new CalendarEventSvc();
        $this->logger->info(__FILE__ . " Controller");
    }

    function saveEvent() {
        $entity = new EntityCalendar_event();
        $entity = PHPBind::array_to_object($_POST, $entity);
        $hourMin = date('H:i');
        $entity->tipo = "calendario";
        $entity->fecha  = $entity->fecha." ".$hourMin;
        if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
            $type = $_FILES["file"]["type"];
            $nombre_tmp = $_FILES["file"]["tmp_name"];
            $data = file_get_contents($nombre_tmp);
            $base64 = 'data:' . $type . ';base64,' . base64_encode($data);
            //$myfile = fopen("./newfile.txt", "w") or die("Unable to open file!");            
            //fwrite($myfile, $base64);
            $entity->img = $base64;
            $entity->tipo = "foto";
        }
        
        //dpr($entity);
        $this->calendarEventSvc->create($entity);       
        header('Content-type: application/json');
        print "{\"id\" : $entity->id}";
    }

    function addEvent($smarty = null) {
        $this->logger->info(__FILE__ . "::addEvent");
        $smarty->assign("fecha", $_GET["fecha"]);
        $smarty->display('addEvent.tpl');
    }

}

?>
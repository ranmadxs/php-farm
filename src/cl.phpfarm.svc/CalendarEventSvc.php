<?php

include_once dirname(__FILE__).'/../cl.phpfarm.model/EntityCalendar_event.php';
include_once 'phpCriteria/Criteria.php';

class CalendarEventSvc{

	var $logger;
	
	function __construct() {
		$this->logger = Logger::getRootLogger();
	}
	
	public function deleteCalendarEvent($id){
            $this->logger->info("delete calendar event id=".$id);
            $criteria = new Criteria();
            $calendarEvent = new EntityCalendar_event();
            $calendarEvent->id=$id;
            $criteria->delete($calendarEvent);            
        }
        
        public function listTiposEventos(){
            $criteria = new Criteria();
            $criteria->setSQL("SELECT COLUMN_TYPE
                                FROM information_schema.COLUMNS
                                WHERE TABLE_SCHEMA = 'py-farm'
                                AND TABLE_NAME = 'calendar_event'
                                AND COLUMN_NAME = 'evento'");
            $criteria->execute();
            $criteriaEventos = $criteria->getArrayList();
            $criteriaEventos = $criteriaEventos[0]["COLUMN_TYPE"];
            $criteriaEventos = str_replace("enum(", "", $criteriaEventos);
            $criteriaEventos = str_replace(")", "", $criteriaEventos);
            $criteriaEventos = str_replace("'", "", $criteriaEventos);
            //dpr($criteriaEventos);
            $eventos = split(",", $criteriaEventos);
            //dpr($eventos);
            return $eventos;
        }
        
	public function getListEventByMes($mes, $anio){
		$this->logger->info("getListEventByMes params ::mes=".$mes.", anio:".$anio);
		$criteria = new Criteria();
		$criteria->setSQL("SELECT * FROM calendar_event WHERE year( `fecha` ) = 
				 $anio AND Month(`fecha`) = $mes ");
		$criteria->execute();
		return $criteria->getArrayList();
	}
	
	public function getListEventByDay($dia, $mes, $anio){
		$this->logger->info("getListEventByMes params ::mes=".$mes.", anio:".$anio.", dia:".$dia);
		$criteria = new Criteria();
		$criteria->setSQL("SELECT * FROM calendar_event WHERE year( `fecha` ) = $anio 
				AND Month(`fecha`) = $mes 
				AND Day(`fecha`) = $dia  ");
		$criteria->execute();
		return $criteria->getArrayList();
	}
	
	public function create(EntityCalendar_event $calendarEvent) {
		$criteria = new Criteria();
		$criteria->persist($calendarEvent);
		$calendarEvent->id = $criteria->getInsertID();
		return $calendarEvent;
	}
	
}
?>
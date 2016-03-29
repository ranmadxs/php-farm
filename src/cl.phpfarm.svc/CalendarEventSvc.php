<?php

include_once 'cl.phpfarm.model/EntityCalendar_event.php';
include_once 'phpCriteria/Criteria.php';

class CalendarEventSvc{
	
	public function getListEventByMes($mes, $anio){
		$criteria = new Criteria();
		$criteria->setSQL("SELECT * FROM calendar_event WHERE year( `fecha` ) = 
				 $anio AND Month(`fecha`) = $mes ");
		$criteria->execute();
		return $criteria->getArrayList();
	}
	
	public function getListEventByDay($dia, $mes, $anio){
		$criteria = new Criteria();
		$criteria->setSQL("SELECT * FROM calendar_event WHERE year( `fecha` ) = $anio 
				AND Month(`fecha`) = $mes 
				AND Day(`fecha`) = $dia  ");
		$criteria->execute();
		return $criteria->getArrayList();
	}
	
	
}
?>
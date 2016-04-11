<?php
include_once 'PHPBind.php';
include_once dirname(__FILE__).'/../cl.phpfarm.svc/CalendarEventSvc.php';
include_once dirname(__FILE__).'/../cl.phpfarm.model/EntityCalendar_event.php';

/**
 @Path("/calendar")
 @Produces(mediaType="json")
 */
class CalendarEventRS {

	var $logger;
	
	function __construct() {
		$this->logger = Logger::getRootLogger();
	}
	
	/**
	 @Path("/listaByMes/{mes}/{anio}")
	 @GET
	 */
	public function listaByMes($mes, $anio){
		$calendarSvc = new CalendarEventSvc();
		$lista = $calendarSvc->getListEventByMes($mes, $anio);
		return $lista;
	}
	//curl -v -H "Accept: application/x-spring-data-compact+json" http://localhost/php-farm/rs-catalog.php/calendar/listaByMes/3/2016	
	

	/**
	 @Path("/listaByDay/{dia}/{mes}/{anio}")
	 @GET
	 */
	public function listaByDay($dia, $mes, $anio){
		$calendarSvc = new CalendarEventSvc();
		$lista = $calendarSvc->getListEventByDay($dia, $mes, $anio);		
		return $lista;
	}
	
	/**
	 @Path("/create")
	 @POST
	 */
	public function create(){
		$this->logger->info(__FILE__."::create");
		$this->logger->debug($_POST);
		$entity = new EntityCalendar_event();
		$entity = PHPBind::array_to_object($_POST, $entity);
		$svc = new CalendarEventSvc();
		$svc->create($entity);
		$this->logger->debug($entity);
		return $entity;
	}
	
}
?>
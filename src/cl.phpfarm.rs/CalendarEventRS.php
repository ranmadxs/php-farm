<?php
include_once 'src/utils/PHPBind.php';
include_once 'src/cl.phpfarm.svc/CalendarEventSvc.php';

/**
 @Path("/calendar")
 @Produces(mediaType="json")
 */
class CalendarEventRS {

	/**
	 @Path("/listaByMes/{mes}/{anio}")
	 @GET
	 */
	public function listaByMes($mes, $anio){
		$calendarSvc = new CalendarEventSvc();
		$lista = $calendarSvc->getListEventByMes($mes, $anio);
		return $lista;
	}

	/**
	 @Path("/listaByDay/{dia}/{mes}/{anio}")
	 @GET
	 */
	public function listaByDay($dia, $mes, $anio){
		$calendarSvc = new CalendarEventSvc();
		$lista = $calendarSvc->getListEventByDay($dia, $mes, $anio);		
		return $lista;
	}
	
}
?>
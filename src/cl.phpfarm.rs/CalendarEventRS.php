<?php
include_once 'PHPBind.php';
include_once dirname(__FILE__).'/../cl.phpfarm.svc/CalendarEventSvc.php';
include_once dirname(__FILE__).'/../cl.phpfarm.svc/TemperaturaSvc.php';
include_once dirname(__FILE__).'/../cl.phpfarm.svc/LuzSvc.php';
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
	 @Path("/delete/{id}")
	 @GET
	 */        
        public function delete($id){
            $calendarSvc = new CalendarEventSvc();
            $calendarSvc->deleteCalendarEvent($id);
            return "{'result' : 'ok'}";
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
                $lista = array();
		$listaEvento = $calendarSvc->getListEventByDay($dia, $mes, $anio);	
                //dpr($listaEvento);
                
                $temperaturaSvc = new TemperaturaSvc();
                $listaTemperatura = $temperaturaSvc->listMaxMinByDay($mes, $anio, $dia);
                if (is_array($listaTemperatura)){
                    foreach ($listaTemperatura as $key => $temperatura) {
                        $arrayEvent = array();
                        $arrayEvent[0]["nombre"] = "Temperaturas y Humedad Ambiental";                        
                        $arrayEvent[0]["descripcion"] = "Temperatura: ".$temperatura["maxTemperatura"]."° / ".$temperatura["minTemperatura"]. "° "
                                . " Humedad: ".$temperatura["maxHumedad"]."% / ".$temperatura["minHumedad"]."% ";
                        $lista = array_merge($lista, $arrayEvent);
                    }
                }
                
                $luzSvc = new LuzSvc();
                $listaLuz = $luzSvc->listCountLuzByDay($mes, $anio, $dia);
                if (is_array($listaLuz)){
                    foreach ($listaLuz as $key => $luz) {
                        $arrayEvent = array();
                        $arrayEvent[0]["nombre"] = "Cantidad de Horas Luz / Oscuridad";                        
                        $arrayEvent[0]["descripcion"] = "".$luz["luz"]." [Hrs] / ".$luz["oscuridad"]. " [Hrs] ";
                        $lista = array_merge($lista, $arrayEvent);
                    }
                }
                
                //dpr($listaTemperatura);
                $lista = array_merge($lista, $listaEvento); 
                //dpr($lista);
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
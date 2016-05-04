<?php
include_once dirname(__FILE__).'/../cl.phpfarm.model/EntityTemperatura.php';
include_once 'phpCriteria/Criteria.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TemperaturaSvc
 *
 * @author esanchez
 */
class TemperaturaSvc {
    var $logger;
	
    function __construct() {
	$this->logger = Logger::getRootLogger();
    }
    
    public function listMaxMinByMes($mes, $anio){
	$this->logger->info("listMaxMinByMes params ::mes=".$mes.", anio:".$anio);
	$criteria = new Criteria();
	$criteria->setSQL("SELECT Day( fecha ) as dia, 
                max(temperatura) as maxTemperatura, 
                min(temperatura) as minTemperatura,
                max(humedad) as maxHumedad, 
                min(humedad) as minHumedad,
                max(fecha) as fecha
                FROM temperatura
                WHERE year( `fecha` ) = $anio
                AND Month( `fecha` ) = $mes
                group by Day( `fecha` )");
	$criteria->execute();
	return $criteria->getArrayList();
    }
    
    public function listMaxMinByDay($mes, $anio, $dia){
	$this->logger->info("listMaxMinByDay params ::mes=".$mes.", anio:".$anio);
	$criteria = new Criteria();
	$criteria->setSQL("SELECT  
                max(temperatura) as maxTemperatura, 
                min(temperatura) as minTemperatura,
                max(humedad) as maxHumedad, 
                min(humedad) as minHumedad 
                FROM temperatura
                WHERE year( `fecha` ) = $anio
                AND Month( `fecha` ) = $mes
                AND Day( `fecha` ) = $dia
                group by Day( `fecha` ) HAVING minHumedad > 0  ");
	$criteria->execute();
	return $criteria->getArrayList();
    }    
}

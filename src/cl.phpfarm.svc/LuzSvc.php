<?php
include_once dirname(__FILE__).'/../cl.phpfarm.model/EntityLuz.php';
include_once 'phpCriteria/Criteria.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LuzSvc
 *
 * @author esanchez
 */
class LuzSvc {
    var $logger;
	
    function __construct() {
	$this->logger = Logger::getRootLogger();
    }
    
    public function listCountLuzByMes($mes, $anio){
	$this->logger->info("listCountLuzByMes params ::mes=".$mes.", anio:".$anio);
	$criteria = new Criteria();
	$criteria->setSQL("SELECT Day( `fecha` ) AS dia, 
            count( estado ) AS luz, 24 - count( estado ) AS oscuridad,
            MAX( `fecha` ) as fecha
            FROM luz
            WHERE year( `fecha` ) = $anio
            AND estado =0
            AND Month( `fecha` ) = $mes
            GROUP BY Day( `fecha` )");
	$criteria->execute();
	return $criteria->getArrayList();
    }
    
    public function listCountLuzByDay($mes, $anio, $dia){
	$this->logger->info("listCountLuzByDay params ::mes=".$mes.", anio:".$anio);
	$criteria = new Criteria();
	$criteria->setSQL("SELECT 
            count( estado ) AS luz, 
            24 - count( estado ) AS oscuridad
            FROM luz
            WHERE year( `fecha` ) = $anio
            AND estado =0
            AND Month( `fecha` ) = $mes
            AND Day( `fecha` ) = $dia");
	$criteria->execute();
	return $criteria->getArrayList();
    }    
}

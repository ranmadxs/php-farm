<?php
/* Class autogenerated whith PHPCriteria v1.1 */

/**
 * @Entity(Table="calendar_event")
*/
class EntityCalendar_event {

	/**
	 * @Id
	 * @Column(Field="id",Type="int(11)",Key="PRI",Null="NO",Default="",Extra="auto_increment")
	*/
	public $id;

	/**
	 * @Column(Field="nombre",Type="varchar(255)",Key="",Null="YES",Default="",Extra="")
	*/
	public $nombre;

	/**
	 * @Column(Field="descripcion",Type="text",Key="",Null="YES",Default="",Extra="")
	*/
	public $descripcion;

	/**
	 * @Column(Field="tipo",Type="enum('calendario')",Key="",Null="YES",Default="",Extra="")
	*/
	public $tipo;

	/**
	 * @Column(Field="fecha",Type="datetime",Key="",Null="YES",Default="",Extra="")
	*/
	public $fecha;

	function __construct() {}
}
?>
<?php
class PHPBind{

    static function get($object){
        return self::reflectionObject($object, $_GET);
    }

    static function post($object){
        return self::reflectionObject($object, $_POST);
    }

    static function object_to_array($object){
        return (get_object_vars($object));
    }

    static function array_to_object($array = array(), $object) {
    $oReflectionClass = new ReflectionClass($object);
    $data = $oReflectionClass->newInstance($oReflectionClass);
    if (!empty($array)) {
        foreach ($array as $akey => $aval) {
            $data -> {$akey} = $aval;
        }
        return $data;
    }
    return false;
    }

    static function post_to_valoresHorario(EntityHorarios $horario, $nombre_var="horario"){
        $horario->hrs_lunes = implode(";", $_POST[$nombre_var]['lunes']);
        $horario->hrs_martes = implode(";", $_POST[$nombre_var]['martes']);
        $horario->hrs_miercoles = implode(";", $_POST[$nombre_var]['miercoles']);
        $horario->hrs_jueves = implode(";", $_POST[$nombre_var]['jueves']);
        $horario->hrs_viernes = implode(";", $_POST[$nombre_var]['viernes']);
        $horario->hrs_sabado = implode(";", $_POST[$nombre_var]['sabado']);
        return $horario;
    }

    private function reflectionObject($object, $type){
        $oReflectionClass = new ReflectionClass($object);
        $listReflectionProperty = $oReflectionClass->getProperties();
        $class = $oReflectionClass->getName();
        foreach ($listReflectionProperty as $key => $reflectionProperty) {
            if(isset($type[$reflectionProperty->name])){
                $value = $type[$reflectionProperty->name];
                $prop = new ReflectionProperty($class, $reflectionProperty->name);
                $prop->setValue($object, $value);
            }
        }
        return $object;
    }
}
?>
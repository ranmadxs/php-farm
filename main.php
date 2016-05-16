<?php 
require_once 'config-inc.php';
include_once("smarty-cfg.php");
include_once 'smarty/Smarty.class.php';

$smarty = new Smarty();
smartyTemplate($smarty, "./");
//dpr($_SERVER);
$smarty->assign("file_content", "calendar-content.tpl");
$smarty->display('layout/main.tpl');


?>
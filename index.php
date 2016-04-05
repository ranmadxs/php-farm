<?php 
require_once 'config-inc.php';
include_once("smarty-cfg.php");
include_once 'smarty/Smarty.class.php';

$smarty = new Smarty();
//dpr($_SERVER);
$smarty->assign("file_content", "index.tpl");
$smarty->display('layout/main.tpl');


?>
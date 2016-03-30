<?php

function smartyTemplate($smarty, $path = ""){
	$smarty->template_dir = $path.'templates';
	$smarty->compile_dir = $path.'templates_c';
	$smarty->config_dir = $path.'configs';
	$smarty->cache_dir = $path.'cache';
}
?>

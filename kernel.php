<?php
	$tab_url1=explode('/', $_SERVER['REQUEST_URI']);
	$tab_url2=explode('/', $_SERVER['SCRIPT_NAME']);
	$tab3=array_diff($tab_url1, $tab_url2);

	if($c=array_shift($tab3)) $controllerName=$c; else $controllerName=DEFAULT_CONTROLLER;
	if($m=array_shift($tab3)) $methodName=$m; else $methodName="index";
	if(isset($tab3[0])) $argsArray=$tab3; else 	$argsArray=array();

	define("SITE_PATH", realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR);
	$controllerFile=SITE_PATH."controllers/".strtolower($controllerName)."_c.php";

	if(is_readable($controllerFile)){
		include($controllerFile);
		$controller = new $controllerName;
		if(is_callable(array($controller, $methodName)))
			$method=$methodName;
		else
			$method="index";
		if(!empty($argsArray))
			call_user_func_array(array($controller, $method), $argsArray);
		else
			call_user_func(array($controller, $method));
	}else {echo "Controller problem =>".$controllerFile;}

<?php
	define('WEB', dirname(__FILE__));
	define('ROOT', dirname(WEB));
	define('DS', DIRECTORY_SEPARATOR);
	define('APP', ROOT.DS.'app');
	define('PATHBODY', APP.DS.'body');
	define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME'])));
	define('NAME_SITE', 'Plate-forme de Maintenance');
	define('URLSITE', 'http://localhost/urouen.fr/');
	require_once '../app/includes.php';
	$init = new Dispatcher();
?>

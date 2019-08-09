<?php 
define('PATH_SYSTEM', __DIR__.'/system');
define('PATH_APPLICATION', __DIR__.'/admin');

require (PATH_SYSTEM. '/config/config.php');

$segments = array(
	'controller' => '',
	'action'     => array()
);

$segments['controller'] = empty($_GET['c']) ? CONTROLLER_DEFAULT : $_GET['c'];

	// Nếu không truyền action thì lấy action mặc định 
$segments['action'] = empty($_GET['a']) ? ACTION_DEFAULT : $_GET['a'];

	// Require controller
require_once PATH_SYSTEM . '/core/FT_Controller.php';

	// Chạy controller
$controller = new FT_Controller();
$controller->load($segments['controller'], $segments['action']);
?>
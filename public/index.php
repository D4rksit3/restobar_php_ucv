<?php
session_start();

require '../core/Controller.php';
require '../core/Model.php';
require '../core/View.php';
require '../core/Database.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'auth';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

$controller = ucfirst($controller) . 'Controller';

require '../controllers/' . $controller . '.php';

$controller = new $controller();
$controller->$action();
?>

<?php
declare(strict_types=1);

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

$controllerName = $_GET['controller'] ?? 'trajet';
$action = $_GET['action'] ?? 'index';

$controllerClass = 'App\\Controllers\\' . ucfirst($controllerName) . 'Controller';

if (!class_exists($controllerClass)) {
    die('Contrôleur introuvable');
}

$controller = new $controllerClass();

if (!method_exists($controller, $action)) {
    die('Action introuvable');
}

$controller->$action();
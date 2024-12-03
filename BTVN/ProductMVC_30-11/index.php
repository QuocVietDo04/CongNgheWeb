<?php
session_start();

require_once 'app/controllers/ProductController.php';
require_once 'app/models/Product.php';

// Router
$controller = $_GET['controller'] ?? 'product';
$action = $_GET['action'] ?? 'index';

$controllerClass = 'App\\Controllers\\ProductController';
$controllerInstance = new $controllerClass();

if (method_exists($controllerInstance, $action)) {
    $controllerInstance->$action();
} else {
    die('Method not found');
}
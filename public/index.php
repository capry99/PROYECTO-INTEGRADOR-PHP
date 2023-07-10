<?php
require __DIR__ . '/../includes/app.php';
use Mfi\Router;
use Controllers\DashController;
use Controllers\LoginController;

$router = new Router();

$router->get('/register', [LoginController::class, 'crear']);
$router->post('/register', [LoginController::class, 'crear']);

$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);

$router->get('/logout', [LoginController::class, 'logout']);

$router->get('/dashboard', [DashController::class, 'dashboard']);

$router->comprobarRutas();

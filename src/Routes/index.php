<?php

session_start();

use App\Controllers\HomeController;
use App\Controllers\UserController;

use App\classes\Router;

$router = new Router();


// WEB
//$router->get('/', HomeController::class, 'index');
$router->get('/login', UserController::class, 'login');


// API
$router->post('/api/login', UserController::class, 'loginAction');
$router->post('/api/register', UserController::class, 'registerAction');
$router->get('/api/logout', UserController::class, 'logoutAction');




$router->route();


<?php

use App\Controllers\HomeController;
use App\Controllers\UserController;

use App\classes\Router;

$router = new Router();


// WEB
$router->get('/', HomeController::class, 'index');
$router->get('/login', UserController::class, 'login');



// API
$router->get('/api/login', UserController::class, 'loginAction');
$router->post('/api/registerAction', UserController::class, 'registerAction');



$router->route();


<?php

session_start();

use App\classes\Router;
use App\Controllers\TagController;
use App\Controllers\UserController;
use App\Controllers\WikiController;
use App\Controllers\CategoryController;


$router = new Router();


// WEB
//$router->get('/', HomeController::class, 'index');
$router->get('/login', UserController::class, 'login');


// API
$router->post('/api/login', UserController::class, 'loginAction');
$router->post('/api/register', UserController::class, 'registerAction');
$router->get('/api/logout', UserController::class, 'logoutAction');


$router->post('/api/category/create', CategoryController::class, 'createCtaegory');
$router->get('/api/category/getall', CategoryController::class, 'getAllCtaegories');
$router->delete('/api/category/deletcategory', CategoryController::class, 'deleteCtaegory');


$router->post('/api/tag/create', TagController::class, 'createTag');
$router->get('/api/tag/getall', TagController::class, 'getAllTags');
$router->delete('/api/tag/deleteTag', TagController::class, 'deleteTag');


$router->post('/api/wiki/create', WikiController::class, 'createWiki');
$router->get('/api/wiki/getall', WikiController::class, 'getAllWikies');
$router->delete('/api/wiki/deleteWiki', WikiController::class, 'deleteWiki');





$router->route();

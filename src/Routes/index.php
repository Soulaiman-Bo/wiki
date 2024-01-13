<?php

session_start();

use App\classes\Router;
use App\Controllers\TagController;
use App\Controllers\UserController;
use App\Controllers\WikiController;
use App\Controllers\SearchController;
use App\Controllers\CategoryController;
use App\Controllers\FrontOfficeControoler;
use App\Controllers\BackOfficeControoler;



$router = new Router();

// WEB
$router->get('/', FrontOfficeControoler::class, 'home');
$router->get('/article', FrontOfficeControoler::class, 'article');


$router->get('/dashboard', BackOfficeControoler::class, 'index');
$router->get('/dashboard/wikies', BackOfficeControoler::class, 'showWikies');
$router->get('/dashboard/createwiki', BackOfficeControoler::class, 'createwiki');

$router->get('/dashboard/users', BackOfficeControoler::class, 'showusers');

$router->get('/dashboard/tags', BackOfficeControoler::class, 'showtags');
$router->get('/dashboard/createtag', BackOfficeControoler::class, 'createwiki');


$router->get('/dashboard/categories', BackOfficeControoler::class, 'showcategories');
$router->get('/dashboard/createcategory', BackOfficeControoler::class, 'createwiki');


$router->get('/login', UserController::class, 'login');
$router->get('/register', UserController::class, 'register');


// API
$router->post('/api/login', UserController::class, 'loginAction');
$router->post('/api/register', UserController::class, 'registerAction');
$router->get('/api/logout', UserController::class, 'logoutAction');


$router->post('/api/category/create', CategoryController::class, 'createCtaegory');
$router->get('/api/category/getall', CategoryController::class, 'getAllCtaegories');
$router->delete('/api/category/deletcategory', CategoryController::class, 'deleteCtaegory');
$router->post('/api/category/updatecategory', CategoryController::class, 'updateCtagory');



$router->post('/api/tag/create', TagController::class, 'createTag');
$router->get('/api/tag/getall', TagController::class, 'getAllTags');
$router->get('/api/tag/getone', TagController::class, 'getOneTagById');
$router->delete('/api/tag/deleteTag', TagController::class, 'deleteTag');
$router->post('/api/tag/updatetag', TagController::class, 'updateTag');


$router->post('/api/wiki/create', WikiController::class, 'createWiki');
$router->get('/api/wiki/getall', WikiController::class, 'getAllWikies');
$router->delete('/api/wiki/deleteWiki', WikiController::class, 'deleteWiki');

$router->post('/wiki/rejectaction', WikiController::class, 'rejectwiki');
$router->post('/wiki/acceptaction', WikiController::class, 'acceptwiki');
$router->post('/wiki/archiveaction', WikiController::class, 'archivewiki');

$router->get('/api/search/tag', SearchController::class, 'searchforTags');
$router->get('/api/search/wiki', SearchController::class, 'searchforWikies');


$router->get('/api/filter/tag', SearchController::class, 'getwikisbyTag');
$router->get('/api/filter/category', SearchController::class, 'getwikisbyCategory');


$router->route();

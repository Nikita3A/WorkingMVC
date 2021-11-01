<?php

use app\controllers\MainController;
use app\Router;

require_once __DIR__.'/../vendor/autoload.php';

$router = new Router();
$router->get('/', [MainController::class, 'index']);
$router->get('/birthday_view', [MainController::class, 'index']);
$router->get('/birthday_view/index', [MainController::class, 'index']);
$router->get('/birthday_view/addBirthday', [MainController::class, 'addBirthday']);
$router->post('/birthday_view/addBirthday', [MainController::class, 'addBirthday']);
$router->get('/birthday_view/change', [MainController::class, 'change']);
$router->post('/birthday_view/change', [MainController::class, 'change']);
$router->post('/birthday_view/delete', [MainController::class, 'delete']);

$router->resolve();

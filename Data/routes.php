<?php


include "Router.php";
use RatePage\Data\Router;

include "Controllers/UserController.php";
use RatePage\Controllers\UserController;

include "Controllers/HomeController.php";
use RatePage\Controllers\HomeController;

$router = new Router();

$router->addRoute('/', HomeController::class, 'index');
$router->addRoute('/error', HomeController::class, 'error');
$router->addRoute('/newReview', HomeController::class, 'newReview');

?>
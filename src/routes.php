<?php

include "Router.php";
use RatePage\Data\Router;

include "Controllers/HomeController.php";
use RatePage\Controllers\HomeController;

$router = new Router($dbContext);

$router->addRoute('/', HomeController::class, 'index');
$router->addRoute('/error', HomeController::class, 'error');
$router->addRoute('/newReview', HomeController::class, 'newReview');
$router->addRoute('/success', HomeController::class, 'success');

?>
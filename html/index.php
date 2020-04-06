<?php

require "../vendor/autoload.php";

use App\Controllers\TodoController;
use App\Routers\Router;

$router = new Router();

$router->post(function () {
    $controller = new TodoController();
    $controller->create();
});

$router->patch(function () {
    $controller = new TodoController();
    $controller->update();
});

$router->get(function () {
    $controller = new TodoController();
    $controller->index();
});

$router->delete(function () {
    $controller = new TodoController();
    $controller->delete();
});

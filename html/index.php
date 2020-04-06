<?php

include '../DB/DB.php';
include '../Models/TaskModel.php';
include '../Routers/Router.php';
include '../Controllers/TodoController.php';
include '../Repositorys/TaskRepository.php';

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


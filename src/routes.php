<?php

use App\Routers\Router;

$router = new Router();

$router->get("TodoController::index");
$router->post("TodoController::create");
$router->patch("TodoController::update");
$router->delete("TodoController::delete");
<?php

require "../vendor/autoload.php";

define("ROOT_DIR", dirname(__DIR__, 1));

use App\Routers\Router;

$router = new Router();

$router->get("TodoController::index");
$router->post("TodoController::create");
$router->patch("TodoController::update");
$router->delete("TodoController::delete");
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "../vendor/autoload.php";

define("ROOT_DIR", dirname(__DIR__, 1));

$dotenv = Dotenv\Dotenv::createImmutable(ROOT_DIR);
$dotenv->load();

require "../src/routes.php";
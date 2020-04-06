<?php

namespace App\Routers;

class Router
{
    public function get($function)
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            $function();
            exit(0);
        }
    }

    public function post($function)
    {
        if (isset($_POST['method']) && $_POST['method'] === "post") {
            $function();
            exit(0);
        }
    }

    public function patch($function)
    {
        if (isset($_POST['method']) && $_POST['method'] === "patch") {
            $function();
            exit(0);
        }
    }

    public function delete($function)
    {
        if (isset($_POST['method']) && $_POST['method'] === "delete") {
            $function();
            exit(0);
        }
    }

}
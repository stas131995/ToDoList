<?php

namespace App\Routers;

class Router
{
    protected function resolvePattern(string $pattern)
    {
        $split = explode("::", $pattern);
        $className = "\\App\\Controllers\\" . $split[0];
        $methodName = $split[1];
        $instance = new $className();
        return $instance->$methodName();
    }

    public function get(string $pattern)
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            return $this->resolvePattern($pattern);
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
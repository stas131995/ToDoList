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

    public function post(string $pattern)
    {
        if (isset($_POST['method']) && $_POST['method'] === "post") {
            return $this->resolvePattern($pattern);
        }
    }

    public function patch(string $pattern)
    {
        if (isset($_POST['method']) && $_POST['method'] === "patch") {
            return $this->resolvePattern($pattern);
        }
    }

    public function delete(string $pattern)
    {
        if (isset($_POST['method']) && $_POST['method'] === "delete") {
            return $this->resolvePattern($pattern);
        }
    }

}
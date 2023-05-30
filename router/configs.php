<?php

final class Router
{
    private array $routes = [METHOD_GET => [], METHOD_POST => []];

    final public function get($path, $controller, $action)
    {
        $this->routes[METHOD_GET][$path] = ["controller" => $controller, "action" => $action];
    }

    final public function post($path, $controller, $action)
    {
        $this->routes[METHOD_POST][$path] = ["controller" => $controller, "action" => $action];
    }

    final public function register()
    {
        $method = $this->getRequestMethod();
        $routes = $this->routes[$method];
        $uri = $this->getRequestUri();

        if (array_key_exists($uri, $routes)) {
            $route = $routes[$uri];
            $controller = $route["controller"];
            $action = $route["action"];
            $instance = new $controller();
            $instance->$action();
        } else {
            http_response_code(STT_NOT_FOUND);
        }
    }

    private function getRequestMethod()
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    private function getRequestUri()
    {
        $query_string = array_key_exists("QUERY_STRING", $_SERVER) ? "?" . $_SERVER["QUERY_STRING"] : "";
        return str_replace($query_string, "", $_SERVER["REQUEST_URI"]);
    }
}

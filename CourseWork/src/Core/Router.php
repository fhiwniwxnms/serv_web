<?php

class Router {
    private $routes = [];

    public function get($url, $controller) {
        $this->routes['GET'][$url] = $controller;
    }

    public function post($url, $controller) {
        $this->routes['POST'][$url] = $controller;
    }

    public function run($url) {
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes[$method] ?? [] as $pattern => $target) {
            if (preg_match('#^' . $pattern . '$#', $url, $matches)) {
                [$controller, $action] = explode('@', $target);
                $obj = new $controller();
                array_shift($matches); 
                $obj->$action(...$matches);
                return;
            }
        }

        http_response_code(404);
        echo '404 — страница не найдена';
    }
}
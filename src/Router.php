<?php

namespace RatePage\Data;

class Router {
    protected $routes = [];

    public function addRoute($route, $controller, $action) {
        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    public function dispatch($uri, $params = []) {
        if (!array_key_exists($uri, $this->routes)) {
            throw new \Exception("No route found for URI: $uri");
            return;
        }

        $route = $this->routes[$uri];

        $controller = $route['controller'];
        $action = $route['action'];

        $controller = new $controller();

        if (count($params) > 0) {
            $controller->$action($params); 
            return;           
        }

        $controller->$action();
    }
}
?>
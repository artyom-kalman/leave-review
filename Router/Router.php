<?php

namespace RatePage\Router;

class Router {
    protected $routes = [];
    protected $dbContext;

    public function __construct($dbContext) {
        $this->dbContext = $dbContext;  
    }

    public function addRoute($route, $controller, $action): void {
        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    public function dispatch($uri): void {
        if (!array_key_exists($uri, $this->routes)) {
            throw new \Exception("No route found for URI: $uri");
            return;
        }

        $route = $this->routes[$uri];

        $controller = $route['controller'];
        $action = $route['action'];

        $controller = new $controller($this->dbContext);
        $controller->$action();
    }
}
?>
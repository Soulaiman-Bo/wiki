<?php

namespace App\classes;

class Router
{
    protected $routes = [];

    private function createRoute($route, $controller, $action, $method)
    {
        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];
    }

    public function get($route, $controller, $action)
    {
        $this->createRoute($route, $controller, $action, "GET");
    }

    public function post($route, $controller, $action)
    {
        $this->createRoute($route, $controller, $action, "POST");
    }

    public function delete($route, $controller, $action)
    {
        $this->createRoute($route, $controller, $action, "DELETE");
    }

    public function update($route, $controller, $action)
    {
        $this->createRoute($route, $controller, $action, "PUT");
    }

    public function route()
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $method =  $_SERVER['REQUEST_METHOD'];

        if (array_key_exists($uri, $this->routes[$method])) {
            $controller = $this->routes[$method][$uri]['controller'];
            $action = $this->routes[$method][$uri]['action'];

            $controller = new $controller();
            $controller->$action();
        } else {
            throw new \Exception("No route found for URI: $uri");
        }
    }


}





<?php

namespace App\classes;
use App\Middleware\Middleware;


class Router
{
    protected $routes = [];

    private function createRoute($route, $controller, $action, $method)
    {

        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action, 'middleware' => null];
        return $this;
    }

    public function get($route, $controller, $action)
    {
        return $this->createRoute($route, $controller, $action, "GET");
    }

    public function post($route, $controller, $action)
    {
        return $this->createRoute($route, $controller, $action, "POST");
    }

    public function delete($route, $controller, $action)
    {
        return $this->createRoute($route, $controller, $action, "DELETE");
    }

    public function update($route, $controller, $action)
    {
        return $this->createRoute($route, $controller, $action, "PUT");
    }


    public function middelware($key)
    {
        $lastMethod = array_key_last($this->routes);
        if ($lastMethod !== null) {
            $lastRoute = end($this->routes[$lastMethod]);


            if ($lastRoute !== false) {
                $lastKey = key($this->routes[$lastMethod]);
                $this->routes[$lastMethod][$lastKey]['middleware'] = $key;
            } else {
                echo '1';
            }
        } else {
            echo '2';
        }
    }


    public function route()
    {
        // $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
        // $_SESSION["data"] = isset(parse_url($_SERVER['REQUEST_URI'])['query']) ? parse_url($_SERVER['REQUEST_URI'])['query'] : Null;
        // $method =  $_SERVER['REQUEST_METHOD'];

        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $method =  $_SERVER['REQUEST_METHOD'];


        if (array_key_exists($uri, $this->routes[$method])) {

            $middleware = new Middleware();
            $middleware->resolve($this->routes[$method][$uri]['middleware']);

            $controller = $this->routes[$method][$uri]['controller'];
            $action = $this->routes[$method][$uri]['action'];
            $controller = new $controller();
            $controller->$action();
        } else {
            throw new \Exception("No route found for URI: $uri");
        }
    }
}

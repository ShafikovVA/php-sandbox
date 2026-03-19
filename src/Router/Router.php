<?php

namespace src\Router;

use Closure;

use HttpMethod;
use src\Router\Route\Route;

class Router
{
    /** @var array<string, Route> */
    private array $routes = [];

    public function addRoute(
        HttpMethod $method,
        string $path,
        Closure $handler,
    ): Router {
        $route = new Route(method:  $method, path: $path, handler: $handler);
        $this->routes[$path] = $route;

        return $this;
    }

    public function init(): void {
        if (empty($this->routes)) {
            echo 404;
            return;
        }
        $route = $this->routes[$_SERVER['REQUEST_URI']];
        if (!isset($route)){
            echo 404;
             return;
        }
        if ($route->method->value !== $_SERVER['REQUEST_METHOD']){
           echo 405;
            return;
        }

        echo ($route->handler)();


    }
}
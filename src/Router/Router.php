<?php

namespace src\Router;

use Closure;

use HttpMethod;
use src\Router\Route\Route;

class Router
{
    /** @var Route[] */
    private array $routes = [];

    public function addRoute(
        HttpMethod $method,
        string $path,
        Closure $handler,
    ): Router {
        $route = new Route(method:  $method, path: $path, handler: $handler);
        $this->routes[] = $route;

        return $this;
    }

    public function init(): void {
        foreach ($this->routes as $route) {
            if ($_SERVER['REQUEST_METHOD'] === $route->method->value && $_SERVER['REQUEST_URI'] === $route->path) {
                ($route->handler)();
                return;
            }
        };
        echo 404;

    }
}
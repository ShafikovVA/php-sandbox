<?php

namespace src\share\Router\Collections;

use src\share\Router\Entities\Route;
use src\share\Router\Enums\HttpMethod;

class RouteCollection
{
    private array $routes = [];

    public function add(HttpMethod $method, Route $route): void
    {
        $this->routes[$method->value][] = $route;
    }

    public function all(): array
    {
        return $this->routes;
    }

}
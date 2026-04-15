<?php

namespace src\share\Router;

use Closure;
use src\share\Router\Collections\RouteCollection;
use src\share\Router\Entities\Route;
use src\share\Router\Enums\HttpMethod;
use src\share\Router\Validators\RouteValidator;

class Router
{
    /** @var Route
     */

    private RouteCollection $routes;
    public function __construct(private RouteValidator $validator)
    {
        $this->routes = new RouteCollection();
    }

    public function addRoute(
        HttpMethod $method,
        string $path,
        Closure $handler,
    ): Router {
        $regexPattern = '/\{(\w+)\}/';
        $pattern = preg_replace($regexPattern, '([^/]+)', $path);
        $pattern = "#^$pattern$#";
        preg_match_all($regexPattern, $path, $params);
        $params = $params[1];
        $this->routes->add($method, new Route(path: $path, handler: $handler, routePattern: $pattern, params: $params));

        return $this;
    }

    public function init(): void {
        $httpResponse = $this->validator->validate($this->routes->all());
        http_response_code($httpResponse->status->value);
        echo $httpResponse->message;
    }
}
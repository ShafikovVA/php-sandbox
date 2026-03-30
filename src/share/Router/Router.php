<?php

namespace src\share\Router;

use Closure;
use src\share\Http\HttpRequest\HttpRequest;
use src\share\Http\HttpResponse\HttpResponse;

class Router
{
    /** @var Route
     */

    public function __construct(private RouteValidator $validator)
    {
    }

    private mixed $routes;

    public function addRoute(
        HttpMethod $method,
        string $path,
        Closure $handler,
    ): Router {

        $this->routes[$method->value][$path] = new Route(path: $path, handler: $handler);

        return $this;
    }

    public function init(): void {
        $httpResponse = $this->validator->validate($this->routes);
        http_response_code($httpResponse->status->value);
        echo $httpResponse->message;
    }
}
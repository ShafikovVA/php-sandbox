<?php

namespace src\share\Router;

use src\share\Http\HttpResponse\HttpResponse;
use src\share\Http\HttpStatus\HttpStatus;
use src\share\Validator\ValidatorInterface;

class RouteValidator implements ValidatorInterface
{
    public function validate(array $routes): HttpResponse
    {
        if (empty($routes)) {
            return new HttpResponse(
                status: HttpStatus::NOT_FOUND,
            );
        }

        $method = $_SERVER['REQUEST_METHOD'];
        if (!isset($routes[$method])) {
            return new HttpResponse(
                status: HttpStatus::METHOD_NOT_ALLOWED,
            );
        }

        $route = $routes[$method][$_SERVER['REQUEST_URI']];

        if (!isset($route)) {
            return new HttpResponse(
                status: HttpStatus::NOT_FOUND,
            );
        }

        return new HttpResponse(
            status: HttpStatus::SUCCESS,
            message: ($route->handler)(),
        );
    }
}
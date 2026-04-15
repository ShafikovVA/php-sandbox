<?php

namespace src\share\Router\Validators;

use src\share\Http\HttpRequest\HttpRequest;
use src\share\Http\HttpResponse\HttpResponse;
use src\share\Http\HttpStatus\HttpStatus;
use src\share\Router\Enums\HttpMethod;
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

        $requestPath = $_SERVER['PATH_INFO'];

        foreach ($routes[$method] as $route) {
            if (preg_match($route->routePattern, $requestPath, $matches)) {
                $paramNames = $route->params;
                $paramValues = array_slice($matches, 1);
                $params = array_combine($paramNames, $paramValues);

                $rawData = file_get_contents('php://input');

                $routeData = ($route->handler)(new HttpRequest(path: $requestPath, method: HttpMethod::from($method), body: $rawData, params: $params), HttpResponse::class);

                if ($routeData instanceof HttpResponse) {
                    $routeResponse = $routeData;
                } else {
                    $routeResponse = new HttpResponse(
                        status: HttpStatus::SUCCESS,
                        message: $routeData,
                    );
                }
                return $routeResponse;
            }
        }

        return new HttpResponse(
            status: HttpStatus::NOT_FOUND,
        );
    }
}
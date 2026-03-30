<?php
require 'src/share/Validator/ValidatorInterface.php';
require 'src/share/Http/HttpResponse/HttpResponse.php';
require 'src/share/Http/HttpRequest/HttpRequest.php';
require 'src/share/Http/HttpStatus/HttpStatus.php';
require 'src/share/Router/RouteValidator.php';
require 'src/share/Router/HttpMethod.php';
require 'src/share/Router/Route.php';
require 'src/share/Router/Router.php';

use src\share\Router\HttpMethod;
use src\share\Router\Router;
use src\share\Router\RouteValidator;

$routerValidator = new RouteValidator();
$router = new Router($routerValidator);

$router->addRoute(
    method: HttpMethod::GET,
    path: '/test',
    handler: function () {
       return 'Test';
    }
)->addRoute(
    method: HttpMethod::GET,
    path: '/test1',
    handler: function () {
        return 'Test1';
    }
)->init();
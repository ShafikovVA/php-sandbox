<?php
require 'src/share/Validator/ValidatorInterface.php';
require 'src/share/Http/HttpResponse/HttpResponse.php';
require 'src/share/Http/HttpRequest/HttpRequest.php';
require 'src/share/Http/HttpStatus/HttpStatus.php';
require 'src/share/Router/Validators/RouteValidator.php';
require 'src/share/Router/Collections/RouteCollection.php';
require 'src/share/Router/Enums/HttpMethod.php';
require 'src/share/Router/Helpers/RouteHelper.php';
require 'src/share/Router/Entities/Route.php';
require 'src/share/Router/Router.php';

use src\share\Router\Enums\HttpMethod;
use src\share\Router\Router;
use src\share\Router\Validators\RouteValidator;
use src\share\Http\HttpResponse\HttpResponse;
use src\share\Http\HttpRequest\HttpRequest;

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
)->addRoute(
    method: HttpMethod::GET,
    path: '/test/{dynamic}/{test}',
    handler: function (HttpRequest $httpRequest) {
        return new HttpResponse(status: \src\share\Http\HttpStatus\HttpStatus::SUCCESS, message: $httpRequest->params['dynamic'] . ' ' . $httpRequest->params['test']);
    }
)->init();
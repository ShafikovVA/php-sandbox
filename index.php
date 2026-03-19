<?php
require 'src/Router/Route.php';
require 'src/Router/Router.php';
require 'src/Router/HttpMethod.php';

use src\Router\Router;

$router = new Router();

$router->addRoute(
    method: HttpMethod::GET,
    path: '/test',
    handler: function () {
        echo 'Test';
    }
)->addRoute(
    method: HttpMethod::GET,
    path: '/test1',
    handler: function () {
        echo 'Test1';
    }
)->init();
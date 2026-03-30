<?php

namespace src\share\Validator;

use src\share\Http\HttpResponse\HttpResponse;
use src\share\Router\Route;

interface ValidatorInterface
{
    public function validate(array $routes): HttpResponse;
}
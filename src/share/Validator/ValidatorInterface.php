<?php

namespace src\share\Validator;

use src\share\Http\HttpResponse\HttpResponse;

interface ValidatorInterface
{
    public function validate(array $routes): HttpResponse;
}
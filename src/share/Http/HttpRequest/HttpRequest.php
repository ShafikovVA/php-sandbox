<?php

namespace src\share\Http\HttpRequest;

use http\Message\Body;
use src\share\Router\HttpMethod;

class HttpRequest
{
    public function __construct(
        public readonly string $path,
        public readonly HttpMethod $method,
        public readonly Body $body,
    )
    {
    }
}
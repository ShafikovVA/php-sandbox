<?php

namespace src\share\Http\HttpRequest;

use http\Message\Body;
use src\share\Router\Enums\HttpMethod;

class HttpRequest
{
    public function __construct(
        public readonly string $path,
        public readonly HttpMethod $method,
        public readonly string $body,
        public readonly array $params,
    )
    {
    }
}
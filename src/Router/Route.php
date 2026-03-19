<?php
namespace src\Router\Route;

use Closure;
use HttpMethod;

final readonly class Route {
    public function __construct(
        public HttpMethod $method,
        public string $path,
        public Closure $handler,
    )
    {
    }
}
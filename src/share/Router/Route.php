<?php
namespace src\share\Router;

use Closure;

final readonly class Route {
    public function __construct(
        public string $path,
        public Closure $handler,
    )
    {
    }
}
<?php
namespace src\share\Router\Entities;

use Closure;

final readonly class Route {

    public function __construct(
        public string $path,
        public Closure $handler,
        public string|null $routePattern = null,
        public array $params = [],
    )
    {
    }
}
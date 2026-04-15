<?php

namespace src\share\Router\Helpers;

class RouteHelper
{
    static string $regexPath = '/\{(\w+)\}/';
    static function parsePath($path) {

        preg_match(self::$regexPath, $path, $matches);
        return $matches;
    }
}
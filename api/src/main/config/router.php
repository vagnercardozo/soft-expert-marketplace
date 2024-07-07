<?php

namespace Main\Config;

class Router
{

    public static function get(string $path, string $controller)
    {
        self::handleResponse($path, $controller, 'GET');
    }

    public static function post(string $path, string $controller)
    {
        self::handleResponse($path, $controller, 'POST');
    }

    public static function put(string $path, string $controller)
    {
        self::handleResponse($path, $controller, 'PUT');
    }

    public static function delete(string $path, string $controller)
    {
        self::handleResponse($path, $controller, 'DELETE');
    }

    private static function handleResponse(string $route, mixed $controller, string $method)
    {
        print($route);
        print($method);
        print($controller);
    }
}

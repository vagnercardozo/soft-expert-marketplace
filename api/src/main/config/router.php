<?php

namespace Main\Config;

class Router
{

    public static function get(string $path, string $controller, array $middlewares = [])
    {
        self::handleResponse($path, $controller, 'GET', $middlewares);
    }

    public static function post(string $path, string $controller, array $middlewares = [])
    {
        self::handleResponse($path, $controller, 'POST', $middlewares);
    }

    public static function put(string $path, string $controller, array $middlewares = [])
    {
        self::handleResponse($path, $controller, 'PUT', $middlewares);
    }

    public static function delete(string $path, string $controller, array $middlewares = [])
    {
        self::handleResponse($path, $controller, 'DELETE', $middlewares);
    }

    private static function handleResponse(string $route, mixed $controller, string $method, array $middlewares)
    {
        print($route);
        print($method);
        print($controller);
        print_r($middlewares);
    }
}

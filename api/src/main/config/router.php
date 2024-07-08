<?php

namespace Main\Config;

class Router
{

    public static function get(string $path, mixed $controller)
    {
        self::handleResponse($path, $controller, 'GET');
    }

    public static function post(string $path, mixed $controller)
    {
        self::handleResponse($path, $controller, 'POST');
    }

    public static function put(string $path, mixed $controller)
    {
        self::handleResponse($path, $controller, 'PUT');
    }

    public static function delete(string $path, mixed $controller)
    {
        self::handleResponse($path, $controller, 'DELETE');
    }

    private static function handleResponse(string $route, mixed $controller, string $method)
    {
        $controllerInstance = $controller->make();
        $input = [];

        if ($method === 'GET') {
            $input = $_GET['id'];
        }
        if ($method === 'POST') {
            $input = json_decode(file_get_contents("php://input"), true) ?? [];
        }
        $result = $controllerInstance->handle($input);
        echo $result;
    }
}

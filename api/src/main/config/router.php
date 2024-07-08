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

        if (!self::verifyRoute($route)) {
            return;
        }
        if ($method === 'GET') {
            $input = json_decode(file_get_contents("php://input"), true)['id'];
        }
        if ($method === 'POST') {
            $input = json_decode(file_get_contents("php://input"), true) ?? [];
        }
        $result = $controllerInstance->handle($input);
        echo $result;
        exit();
    }

    private static function verifyRoute(string $route)
    {
        $requesUrl = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
        $serverUrl =  explode('/', $requesUrl);
        array_shift($serverUrl);
        array_shift($serverUrl);
        $localUrl = explode('/', $route);
        array_shift($localUrl);
        array_shift($localUrl);
        return (current($localUrl) === current($serverUrl)) && (count($localUrl) === count($serverUrl));
    }
}

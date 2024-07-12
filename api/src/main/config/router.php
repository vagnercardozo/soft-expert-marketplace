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

        if (!($_SERVER['REQUEST_METHOD'] === $method)) {
            return;
        }
        if ($method === 'GET' || $method === 'DELETE') {
            $data = $_GET;
            if (isset($data['id'])) {
                $input = $data['id'];
            }
        }
        if ($method === 'POST' || $method === 'PUT') {
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
        $localUrl = explode('/', $route);

        return ($serverUrl[1] === $localUrl[1] && $serverUrl[2] === $localUrl[2]);
    }
}

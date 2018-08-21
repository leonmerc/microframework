<?php

namespace Framework\Core;


class Router
{

    /**
     * Collection of routes
     *
     * @var array
     */
    public static $routes = [
        'GET' => [],
        'POST' => [],
    ];

    /**
     * Loads user specified routes
     *
     * @param string $file
     * @return Router
     */
    public static function setup($file)
    {
        require $file;

        return new static;
    }

    /**
     * Registers a route with corresponding method to the list of routes
     *
     * @param string $requestMethod
     * @param string $path
     * @param string $controller
     */
    private static function addRoute($requestMethod, $path, $controller)
    {
        self::$routes[$requestMethod][$path] = $controller;
    }

    /**
     * Registers a get route
     *
     * @param string $path
     * @param string $controller
     */
    public static function get($path, $controller)
    {
        self::addRoute('GET', $path, $controller);
    }

    /**
     * Registers a post route
     *
     * @param string $path
     * @param string $controller
     */
    public static function post($path, $controller)
    {
        self::addRoute('POST', $path, $controller);
    }

    /**
     * Loads the registered controller for the given path
     *
     * @param string $requestMethod
     * @param string $path
     *
     * @return mixed
     */
    public static function direct($requestMethod, $path)
    {
        if (array_key_exists($path, self::$routes[$requestMethod])) {
            $callData = explode('@', self::$routes[$requestMethod][$path]);

            return self::call($callData[0], $callData[1]);
        }

        throw new Exception('There is no registered route for given path.');
    }

    /**
     * Calls the method on a given Controller class
     *
     * @param string $requestMethod
     * @param string $path
     *
     * @return mixed
     */
    private static function call($methodName, $controllerName)
    {
        $controller = "Framework\\Controllers\\{$controllerName}";
        $controller = new $controller;

        if (method_exists($controller, $methodName)) {
            return $controller->$methodName();
        }

        throw new Exception("There is no {$methodName} implemented on {$controllerName}");

    }
}
<?php

namespace Framework\Core;


class Request
{
    /**
     * Get the current request path
     *
     * @return string
     */
    public static function path()
    {
        $basePath = dirname($_SERVER['PHP_SELF']);
        $fullPath = $_SERVER['REQUEST_URI'];

        return trim(substr($fullPath,strlen($basePath)),'/');
    }

    /**
     * Get the current request method
     *
     * @return string
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
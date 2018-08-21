<?php

namespace Framework\Core;


class Container
{

    /**
     * Array of all registered bindings
     *
     * @var array
     */
    protected static $library = [];

    /**
     * Add binding to the library
     *
     * @param string $name
     * @param mixed $value
     */
    public static function attach($name, $value)
    {
        static::$library[$name] = $value;
    }

    /**
     * retrieves the attached key, if it exist
     *
     * @param string $name
     * @return mixed
     */
    public static function retrieve($name)
    {
        return array_key_exists($name, static::$library) ? static::$library[$name] : null;
    }
}
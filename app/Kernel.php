<?php

namespace Phramework\App;

class Kernel
{
    // set the empty container for the dependecy injection
    protected static $container = [];

    /**
     * Set the method to bind dependecies inside the container
     * 
     * @param $key
     * @param $dependency
     */
    public static function bind($key, $dependency)
    {
        static::$container[$key] = $dependency;
    }

    /**
     * Get a certain dependency injected inside the container
     * 
     * @param $key
     */
    public static function get($key)
    {
        return static::$container[$key];
    }
}
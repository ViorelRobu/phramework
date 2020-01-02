<?php

namespace Phramework\Core\Routes;

class Request
{
    /**
     * Gets the uri corresponding to the request
     */
    public static function uri()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    /**
     * Gets the method corresponding to the request
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
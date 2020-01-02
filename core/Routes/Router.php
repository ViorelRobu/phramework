<?php

namespace Phramework\Core\Routes;

use Exception;

class Router
{
    /**
     * Routes array
     */
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    /**
     * Loads the routes file
     * 
     * @param $file
     * @return Router
     */
    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }

    /**
     * Load the routes responding to the get request
     * 
     * @param $uri
     * @param $controller
     */
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * Load the routes responding to the post request
     * 
     * @param $uri
     * @param $controller
     */
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * Load the corresponding route or throw an error
     */
    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            $this->callController(
                ...explode("@", $this->routes[$requestType][$uri])
            );
        } else {
            throw new Exception("No routes found for this URI!");
        }
    }

    /**
     * Loads the corresponding controller from the routes file
     */
    protected function callController($controller, $action)
    {
        $controller = "Phramework\\App\\Controllers\\{$controller}";

        $controller = new $controller;

        if (!method_exists($controller, $action)) {
            throw new \Exception(
                "On {$controller} there is no ($action} action!"
            );
        }

        return $controller->$action();
    }    
}
<?php

/**
 *  ======================================================================
 * | Here you can define your own helper functions that will be shared
 * | across all the application and can be used by any class
 *  ======================================================================
 */

/**
 * Uses var_dump to show all the data and then die
 * 
 * @param $value
 */
function dd($value)
{
    var_dump($value);
    die();
}

/**
 * Return the view
 */
function view($name, $data=[])
{
    extract($data);
    return require __DIR__ . "/../app/Views/{$name}.view.php";
}

/**
 * Redirects the user to the set path
 */
function redirect($path)
{
    return header("Location: " . $path);
}

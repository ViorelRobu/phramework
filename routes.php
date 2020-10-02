<?php

/**
 * ===========================================================================================================================
 * | Here you can define your application routes. The first parameter for the route must start with a forward slash, all other
 * | names will throw a "No routes found for this URI!" exception
 * ===========================================================================================================================
 */
$router->get('/', 'DefaultController@index');
$router->get('/add/column', 'DefaultController@newColumn');
$router->get('/delete/column', 'DefaultController@deleteColumn');
$router->post('/store', 'DefaultController@store');
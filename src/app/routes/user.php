<?php
/*
 |--------------------------------------------------------------------------
 | User REST methods example
 |--------------------------------------------------------------------------
 |
 | Here you may specify the default timezone for your application, which
 | will be used by the PHP date and date-time functions. We have gone
 | ahead and set this to a sensible default for you out of the box.
 |
*/

use Core\Modules\Route\Route;

$router = new Route();

//Get all books
$router->get('users', 'UserController@index');

//Show book by uuid
$router->get('users/:id', 'UserController@show');

//Create new book
$router->post('users', 'UserController@create');

//Update book
$router->put('users/:id', 'UserController@update');

//Delete book
$router->delete('users/:id', 'UserController@delete');

return $router;
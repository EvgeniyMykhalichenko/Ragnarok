<?php
/*
 |--------------------------------------------------------------------------
 | Book REST methods example
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
$router->get('books', 'BookController@index');

//Show book by uuid
$router->get('books/:uuid', 'BookController@show');

//Create new book
$router->post('books', 'BookController@create');

//Update book
$router->put('books/:uuid', 'BookController@update');

//Delete book
$router->delete('books/:uuid', 'BookController@delete');

return $router;
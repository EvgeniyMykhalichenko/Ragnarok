<?php

use Core\Modules\Route\Route;

$router = new Route();
$router->get('test', 'IndexController@index');
$router->get('lol/:user', 'IndexController@index');
$router->get('user/:user/update/:id', 'IndexController@index');

return $router;
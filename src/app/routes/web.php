<?php

require '../core/modules/Autoload.php';

use app\components\Autoload;
use core\modules\Router;

AutoLoad::load();

$router = new Router();

$router->get('/', 'IndexController', 'index')
	->get('/test', 'IndexController', 'index')
	->get('/user/{user}', 'IndexController', 'index')
	->start();
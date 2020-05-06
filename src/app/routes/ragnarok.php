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

return (new Route())
	->get('', 'BookController@index');
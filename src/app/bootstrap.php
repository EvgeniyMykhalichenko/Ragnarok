<?php

namespace App;

use Core\Modules\Route\Router;
use Core\Modules\Route\RouteStorage;

class Bootstrap
{
	private const APP_DIR = '../../app/';

	public function __construct()
	{
		$this->loadHelpers();
		$this->loadRouter();
	}

	public function loadHelpers()
	{
		require_once '../../core/helpers/helpers.php';
	}

	public function loadRouter()
	{
		new Router(new RouteStorage());
	}
}
<?php

namespace App;

use Core\Modules\Route\Route;
use Core\Modules\Route\Router;

class Bootstrap
{
	private const APP_DIR = '../../app/';

	public function __construct()
	{
		$this->loadHelpers();
		$this->loadRout();
	}

	public function loadHelpers()
	{
		require_once '../../core/helpers/helpers.php';
	}

	public function loadRout()
	{
		$routs = include(self::APP_DIR . "routes/web.php");
		new Router($routs->collection);
	}
}
<?php


namespace Core\Modules\Route;

use Core\Modules\ModuleExtension;

class RouterModuleExtension extends ModuleExtension {

	public function register(): Router
	{
		return new Router(new RouteStorage($this->app));
	}

}
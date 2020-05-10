<?php


namespace Core\Modules;


use Core\Application;

class ModuleExtension {

	public Application $app;

	public function __construct(Application $app)
	{
		$this->app = $app;
	}


	public function register() {}

}
<?php


namespace Core\Modules\Config;

use Core\Application;

class Config {

	private array $configs = [];

	public function __construct(Application $app)
	{
		$this->configs = $app->loadFiles($app->configPath());
	}

	public function __get($name)
	{
		return $this->configs[$name] ??= $this->configs[$name];
	}
}
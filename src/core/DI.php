<?php


namespace Core;


class DI {

	private array $modules;

	public function register(string $moduleName, object $obj): void
	{
		$this->modules[$moduleName] = $obj;
	}

	public function getModule(string $moduleName): object
	{
		if(!array_key_exists($moduleName, $this->modules)) {
			throw new \Exception('Not found');
		}

		return $this->modules[$moduleName];
	}

	public function getModules()
	{
		return $this->modules;
	}
}
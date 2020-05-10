<?php


namespace Core\Modules\Di;


/**
 * Class DI
 * Dependency injection
 *
 * @package Core
 * @author  Krepysh <mykhalichenkoEvgeniy@gmail.com>
 */
class DI {

	private array $modules = [];

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

	public function getModules(): array
	{
		return $this->modules;
	}
}
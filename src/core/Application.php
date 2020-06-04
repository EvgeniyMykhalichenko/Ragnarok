<?php


namespace Core;

use Core\Modules\Config\ConfigExtension;
use Core\Modules\Route\RouterExtension;
use Core\Modules\Di\DI;

class Application extends DI {

	protected string $basePath;

	protected string $appPath;

	public final static function version()
	{
		return '0.1';
	}

	public function __construct(string $basePatch)
	{
		require_once 'helpers/helpers.php';
		$this->setBasePath($basePatch);
		$this->registerBaseModulesExtension();
	}

	public function path(string $path = ''): string
	{
		$appPath = $this->appPath ?: $this->basePath . DIRECTORY_SEPARATOR . 'app';

		return $appPath . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}

	public function basePath(string $path = ''): string
	{
		return $this->basePath . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}

	public function setBasePath(string $basePath): Application
	{
		$this->basePath = rtrim($basePath, '\/');

		return $this;
	}

	public function configPath(string $path = ''): string
	{
		return $this->basePath . DIRECTORY_SEPARATOR . 'configs' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}

	public function databasePath(string $path = ''): string
	{
		return $this->basePath . DIRECTORY_SEPARATOR . 'database' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}

	public function routePath(string $path = ''): string
	{
		return $this->basePath . DIRECTORY_SEPARATOR . 'routes' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}

	public function loadFiles(string $path): array
	{
		if (!is_dir($path))
		{
			return [];
		}

		$files = array_diff(scandir($path), ['.', '..']);

		if (empty($files)) {
			return [];
		}

		$collection = [];

		foreach ($files as $file)
		{
			$loaded = include_once($path . DIRECTORY_SEPARATOR . $file);
			$collection = array_merge($collection, $loaded);
		}

		return $collection;
	}

	private function registerBaseModulesExtension(): void
	{
		$this->register('router', function () {
			return new RouterExtension($this);
		});

		$this->register('config', function () {
			return new Modules\Config\Config($this);
		});

	}

	public function run(): void
	{
		foreach ($this->getModules() as $moduleName => $module)
		{
			if (!method_exists($module, 'register'))
			{
				throw new \Exception("Method register not exist in {$moduleName} extension");
			}

			$module->register();
		}
	}
}
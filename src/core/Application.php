<?php


namespace Core;

use Core\Modules\Route\RouterModuleExtension;

class Application extends DI {

	public string $basePath;

	public string $appPath;

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

	public function setBasePath(string $basePath): Application
	{
		$this->basePath = rtrim($basePath, '\/');

		return $this;
	}

	public function path($path = '')
	{
		$appPath = $this->appPath ?: $this->basePath.DIRECTORY_SEPARATOR.'app';

		return $appPath.($path ? DIRECTORY_SEPARATOR.$path : $path);
	}

	public function registerBaseModulesExtension()
	{
		$this->register('router', new RouterModuleExtension($this));
	}

	public function basePath(string $path = ''): string
	{
		return $this->basePath.($path ? DIRECTORY_SEPARATOR.$path : $path);
	}

	public function run()
	{
		foreach ($this->getModules() as $moduleName => $module) {
			$module->register();
		}
	}
}
<?php


namespace Core\Modules;


class Config {

	private array $configs = [];

	public function __construct()
	{
		$dir = './../../app/configs';

		if (!is_dir($dir)) {
			return [];
		}

		if (!empty($configs)) {
			return $this->configs;
		}

		$configs = array_diff(scandir($dir), array('.', '..'));

		foreach ($configs as $config) {
			$a = include_once ($dir . '/' . $config);

			$this->configs = array_merge($this->configs, $a);
		}

		return $this->configs;

	}

	public function __get($name)
	{
		return $this->configs[$name] ??= $this->configs[$name];
	}
}
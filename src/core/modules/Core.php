<?php


namespace Core\Modules;


class Core {

	public const DIR = __DIR__;

	protected $configs;

	public function __construct()
	{
		$this->configs = new Config();
	}

}
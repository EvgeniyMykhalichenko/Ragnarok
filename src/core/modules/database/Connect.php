<?php


namespace Core\Modules\Database;


use Core\Modules\Config;

class Connect {

	private Config $configs;

	public function __construct()
	{
		$this->configs = new Config();
	}




}
<?php

namespace Core\Modules;

/**
 * Class AutoLoader
 * @package app\components
 * This class helps automatically connect files
 */
class Autoload
{
	/**
	 *  Load classes
	 */
	public static function load(): void
	{
		spl_autoload_register('self::find');
	}

	/**
	 * Find classes by namespace
	 * @param $className
	 * @return bool
	 */
	private static function find($className)
	{
		$fileName = ucwords("../../" . str_replace("\\", '/', $className) . ".php");
		self::include($fileName, $className);
	}

	private static function include($fileName, $className): void
	{
		require($fileName);
	}

}

return Autoload::load();
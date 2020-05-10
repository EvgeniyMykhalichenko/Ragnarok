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
	public static function load()
	{
		spl_autoload_register('self::findClass');
	}

	public static function loadFromConsole()
	{
		spl_autoload_register('self::findConsoleClass');
	}

	private static function findConsoleClass($className) {
		$fileName = ucwords("../" . str_replace("\\", '/', $className) . ".php");
		self::include($fileName, $className);
	}

	/**
	 * Find classes by namespace
	 * @param $className
	 * @return bool
	 */
	private static function findClass($className)
	{
		$fileName = ucwords("../../" . str_replace("\\", '/', $className) . ".php");
		self::include($fileName, $className);
	}

	private static function include($fileName, $className)
	{
		try{
			if (file_exists($fileName)) {
				require($fileName);
				if (class_exists($className)) {
					return true;
				} else {
					throw new \Exception('Class not found' . $className);
				}
			} else {
				throw new \Exception('File not found' . $fileName);
			}
		} catch (\Exception $mess) {
			echo $mess->getMessage();
		};
	}

}

return Autoload::load();
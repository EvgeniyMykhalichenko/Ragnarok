<?php


namespace Core\Modules\Route;

use SplObjectStorage;

class RouteStorage extends SplObjectStorage {

	private $collection;

	public function __construct()
	{
		$dir = './../../app/routes';

		if (!is_dir($dir)) {
			return [];
		}

		if (!empty($this->collection)) {
			return $this->collection;
		}

		$routs = array_diff(scandir($dir), ['.', '..']);

		foreach ($routs as $route) {
			$a = include_once ($dir . '/' . $route);
			foreach ($a->collection as $route) {
				self::attach($route);
			}
		}
	}

	public function __destruct()
	{
		$temp = [];
		foreach ($this as $route) {
			$temp[] = $route;
		}

		return $temp;
	}

}
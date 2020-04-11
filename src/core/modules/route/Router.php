<?php


namespace Core\Modules\Route;

use Core\Modules\Response;

class Router {

	private RouteStorage $collection;

	public function __construct(RouteStorage $collection)
	{
		$this->collection = $collection;
	}

	public function __destruct()
	{
		$requestURL = strtok(trim($_SERVER['REQUEST_URI'], '/'), '?');

		foreach ($this->collection as $route) {

			$pattern = '@^' . rtrim($route->getRegex(), '/') . '?$@i';

			if (!preg_match($pattern, $requestURL, $matches)) {
				continue;
			}

			return print_r($route->dispatch());

		}

		header('HTTP/1.0 404 Not Found');
		exit();

	}
}
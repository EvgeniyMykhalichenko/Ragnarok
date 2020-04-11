<?php


namespace Core\Modules\Route;

use Core\Modules\Response;

class Router {

	private array $collection;

	public function __construct(array $collection)
	{
		$this->collection = $collection;
	}

	public function __destruct()
	{
		$this->execute();
	}

	private function execute(): Response
	{
		$requestURL = strtok(trim($_SERVER['REQUEST_URI'], '/'), '?');

		foreach ($this->collection as $route) {

			$pattern = '@^' . rtrim($route->getRegex(), '/') . '?$@i';

			if (!preg_match($pattern, $requestURL, $matches)) {
				continue;
			}

//			$params = [];
//
//			if (preg_match_all('/(:\w+)/', $route->getUrl(), $argument_keys)) {
//
//				// grab array with matches
//				$argument_keys = $argument_keys[1];
//
//				if(count($argument_keys) !== (count($matches) -1)) {
//					continue;
//				}
//
//				// loop trough parameter names, store matching value in $params array
//				foreach ($argument_keys as $key => $name) {
//					if (isset($matches[$key+1])) {
//						$params[$name] = $matches[$key+1];
//					}
//				}
//			}

//			$route->setParameters($params);
			return $route->dispatch();

		}

		header('HTTP/1.0 404 Not Found');
		exit();

	}



}
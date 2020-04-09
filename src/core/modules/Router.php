<?php


namespace core\modules;


class Router {

	private $routsCollection;

	public function start()
	{
		$request = strtok(trim($_SERVER['REQUEST_URI']), '?');

		if (empty($this->routsCollection)) {
			return;
		}

		foreach ($this->routsCollection as $route) {

			if ($route->url !== $request) {
				continue;
			}

			$file = dirname(__FILE__) . '/../../controllers/' . $route->controller . '.php';

			if (!file_exists($file)) {
				new \Exception('Controller not found');
			}

			require $file;

			$nameSpase = "app\controllers\\" . $route->controller;
			$load = new $nameSpase;

			if (!method_exists($load, $route->method)) {
				new \Exception('Method not found');
			}

			$request = new Request();
			$load->{$route->method}($request);
			break;

		}

		header('HTTP/1.0 404 Not Found');
		exit();

	}

	public function get ($url, $controller, $method)
	{
		$route = new \stdClass();
		$route->url = trim($url);
		$route->controller = trim($controller);
		$route->method = trim($method);

		$this->routsCollection[] =  $route;

		return $this;
	}

}
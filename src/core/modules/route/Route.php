<?php

namespace Core\Modules\Route;

use Core\Modules\Request;

class Route
{
	public array $collection = [];

	private string $actionDelimiter = '@';

	private string $url;

	private array $parameters = [];

	private string $action;

	public function get(string $resource, string $action): Route
	{
		$route = new self();
		$route->url = trim($resource, '/');
		$route->action = $action;

		$this->collection[] = $route;

		return $this;
	}

	public function getUrl(): string
	{
		return $this->url;
	}


	public function setFilters(array $filters, $parametersByName = false)
	{
		$this->filters          = $filters;
		$this->parametersByName = $parametersByName;
	}

	public function getRegex()
	{
		return preg_replace_callback(
			'/(:\w+)/',
			function ($matches) {
				return '[a-z0-9]+';
			},
			$this->url
		);
	}

	private function substituteFilter($matches)
	{
		return '[a-z0-9]+';
	}

	public function getParameters()
	{
		return $this->parameters;
	}

	public function setParameters(array $parameters)
	{
		$this->parameters = $parameters;
	}

	public function dispatch(): void
	{
		var_dump($this->getParameters());
		list($controller, $method) = explode($this->actionDelimiter, $this->action);

		$controllerPath = "App\Controllers\\" . $controller;

		$instance = new $controllerPath;

		call_user_func_array(array($instance, $method), [new Request()]);
	}

}

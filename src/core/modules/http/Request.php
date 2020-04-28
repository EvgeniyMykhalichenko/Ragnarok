<?php

namespace Core\Modules\Http;


class Request {

	public const GET    = 'GET';
	public const POST   = 'POST';
	public const DELETE = 'DELETE';
	public const PUT    = 'PUT';

	private array $storage;

	private string $method;

	public function __construct()
	{
		$this->storage = $this->cleanInput($_REQUEST);
	}

	public function __get($name)
	{
		if (isset($this->storage[$name])) return $this->storage[$name];
	}

	public function isMethod(string $method): bool
	{
		return $this->method === $method;
	}

	public function getMethod(): string
	{
		return $this->method;
	}

	public function getUserAgent()
	{
		return $_SERVER['HTTP_USER_AGENT'];
	}

	private function cleanInput($data)
	{
		if (is_array($data))
		{
			$cleaned = [];
			foreach ($data as $key => $value)
			{
				$cleaned[$key] = $this->cleanInput($value);
			}

			return $cleaned;
		}

		return trim(htmlspecialchars($data, ENT_QUOTES));
	}

	public function all()
	{
		return $this->storage;
	}
}
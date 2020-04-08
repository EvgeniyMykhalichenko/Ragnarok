<?php

namespace core\modules;


class Request {
	private $storage; // переменная хранящая данные GET и POST


	// при создании объекта запроса мы пропускаем все данные
	// через фильтр-функцию для очистки параметров от нежелательных данных
	public function __construct() {
		$this->storage = $this->cleanInput($_REQUEST);
	}

	// магическая функция, которая позволяет обращатья к GET и POST переменным
	// по имени, например,
	// запрос - myrusakov.ru/user.php?id=Qashbs36e
	// в коде - echo $request -> id
	public function __get($name) {
		if (isset($this->storage[$name])) return $this->storage[$name];
	}


	// очистка данных от опасных символов
	private function cleanInput($data) {
		if (is_array($data)) {
			$cleaned = [];
			foreach ($data as $key => $value) {
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
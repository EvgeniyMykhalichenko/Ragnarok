<?php


namespace App\Preparations\Book;


use Core\Modules\Http\Preparation;

class BookPreparation extends Preparation {

	protected function toBeautify(): array
	{
		return [
			'name'  => $this->name,
			'price' => $this->price,
		];
	}
}
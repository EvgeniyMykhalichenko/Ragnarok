<?php


namespace App\Preparations\User;


use Core\Modules\Http\Preparation;

class UserPreparation extends Preparation {

	protected function toBeautify(): array
	{
		return [
			'id' => $this->id,
			'name'  => $this->name,
		];
	}
}
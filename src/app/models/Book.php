<?php


namespace App\Models;


use Core\Modules\Database\Model;

class Book extends Model {

	protected $table = 'books';

	public function getBooks(): ?array
	{
		return $this->select('*')->many();
	}

}
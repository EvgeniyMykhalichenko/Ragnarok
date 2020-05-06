<?php


namespace App\Database\Models;


use Core\Modules\Database\Model;

class Book extends Model {

	/**
	 * Set table model
	 *
	 * @var string
	 */
	protected $table = 'books';

	public $id;

	public $name;

	public $price;

	public $seller_id;

	/**
	 * Get all books
	 *
	 * @return array|null
	 */
	public function getBooks(): ?array
	{
		return $this
			->select('*')
			->many();
	}

	public function getBookByID(string $id): ?array
	{
		return $this->where('id', $id)->select()->one();
	}

	/**
	 * Get book by name
	 *
	 * @param string $name
	 *
	 * @return mixed
	 */
	public function getBookByName(string $name): ?array
	{
		return $this->where('name', $name)->select()->one();
	}

}
<?php


namespace App\Controllers;

use App\Database\Models\Book;
use App\Preparations\Book\BookPreparation;
use Core\Modules\Http\Request;

class BookController {

	private Book $book;

	public function __construct()
	{
		$this->book = new Book();
	}

	public function index(Request $request)
	{
		return response()->json(BookPreparation::many($this->book->getBooks()));
	}

	public function show($uuid, Request $request)
	{
		return response()->json(BookPreparation::one($this->book->getBookByID($uuid)));
	}

	public function create(Request $request)
	{
		return response()->json([$request->all()]);
	}

	public function update($bookUUID, Request $request)
	{
		return response()->json(['status' => 'success']);
	}

	public function delete($bookUUID)
	{
		return response()->json(['status' => 'success']);
	}

}
<?php


namespace App\Controllers;

use App\Models\Book;
use App\Preparations\BookPreparation;
use Core\Modules\Http\Request;

class BookController {

	public function index(Request $request)
	{
		$book = new Book();
		return response()->json(BookPreparation::many($book->getBooks()));
	}

	public function show($bookUUID)
	{
		return response()->json(['status' => 'success']);
	}

	public function create(Request $request)
	{
		return response()->json(['status' => 'success']);
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
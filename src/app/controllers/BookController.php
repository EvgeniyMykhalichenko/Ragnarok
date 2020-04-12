<?php


namespace App\Controllers;


use App\Models\Book;
use App\Preparations\BookPreparation;
use Core\Modules\Request;

class BookController {

	public function index()
	{
		$book = new Book();
		return response()->json($book->getBooks());
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
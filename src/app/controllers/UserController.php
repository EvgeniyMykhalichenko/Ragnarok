<?php


namespace App\Controllers;


use App\Models\Book;
use Core\Modules\Http\Request;

class UserController {

	public function index(Request $request)
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
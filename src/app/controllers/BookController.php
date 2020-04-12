<?php


namespace App\Controllers;


use App\Models\Book;
use Core\Modules\Request;

class BookController {

	public function index()
	{
		$books = new Book();
		$books->setDb([
			'type' => 'pdomysql',
			'hostname' => 'mysql',
			'database' => 'test',
			'username' => 'root',
			'password' => 'root'
		]);
		$books->insert(['recipe_id' => 12, 'recipe_name' => 'lol']);
		return response()->json(['books' => $books]);
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
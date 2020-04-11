<?php


namespace App\Controllers;


use Core\Modules\Request;

class BookController {

	public function index()
	{
		return response()->json(['status' => 'success']);
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
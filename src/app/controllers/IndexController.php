<?php

namespace App\Controllers;

use Core\Modules\Controller;
use Core\Modules\Request;

class IndexController extends Controller {

	public function index(Request $request)
	{
		return '1';
	}

	public function user(Request $request)
	{
		var_dump('2');die();
	}

}
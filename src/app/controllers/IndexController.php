<?php

namespace App\Controllers;

use core\modules\Controller;
use core\modules\Request;

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
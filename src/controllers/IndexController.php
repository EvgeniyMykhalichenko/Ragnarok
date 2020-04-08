<?php

namespace app\controllers;

use core\modules\Controller;
use core\modules\Request;

class IndexController extends Controller {

	public function index(Request $request)
	{
		return $this->render('welcome', [
			'title' => 'hello',
			'test' => '123'
		]);
	}

}
<?php

return [

	'connect' => 'mysql',

	'connections' => [

		'mysql' => [
			'host'     => env('MYSQL_HOST', '127.0.0.1'),
			'database' => env('MYSQL_DATABASE', ''),
			'user'     => env('MYSQL_USER', ''),
			'password' => env('MYSQL_PASSWORD', '')
		]

	],

];
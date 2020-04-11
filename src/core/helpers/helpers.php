<?php

use Core\Modules\Response;

if (!function_exists('env')) {
	function env($name, $default = null) {
		return getenv($name) ?? $default;
	}
}

if (!function_exists('response')) {
	function response() {
		return new Response();
	}
}

if (!function_exists('dd')) {
	function dd($variable) {
		var_dump($variable);die();
	}
}
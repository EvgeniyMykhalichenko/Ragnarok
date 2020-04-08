<?php


namespace core\modules;


class Controller {
	public function render($view, $params)
	{
		$file = __DIR__ . '/../../views/' . $view . '.php';

		if ( file_exists( $file ) ) {
			$template_found = $file;
			// stop after the first template is found
		}

		// fail if no template file is found
		if ( ! $template_found ) {
			return '';
		}
		// Make values in the associative array easier to access by extracting them
		if ( is_array( $params ) ){
			extract( $params );
		}


		// buffer the output (including the file is "output")
		ob_start();
		include $template_found;
		$content = ob_get_contents();
		ob_end_flush();
		return $content;

	}
}
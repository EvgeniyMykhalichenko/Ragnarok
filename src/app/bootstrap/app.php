<?php

use Core\Application;

return (new Application(
	$_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
));


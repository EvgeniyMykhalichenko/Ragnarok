<?php


namespace Core\Modules\Console\Command;

use Core\Modules\Console\Command\Interfaces\CommandInterface;

abstract class Command implements CommandInterface {

	public string $commandAction = '';

	public string $commandDescription = '';

}
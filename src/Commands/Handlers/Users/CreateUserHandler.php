<?php
// Created by dealloc. All rights reserved.

namespace Festival\Commands\Handlers\Users;

use Festival\Commands\Users\CreateUserCommand;

class CreateUserHandler
{
	public function handle(CreateUserCommand $command)
	{
		return $command;
	}
}
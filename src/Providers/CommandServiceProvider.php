<?php
// Created by dealloc. All rights reserved.

namespace Festival\Providers;

use Festival\Commands\Handlers\Users\CreateUserHandler;
use Festival\Commands\Users\CreateUserCommand;
use Ichtus\Commands\Providers\CommandServiceProvider as ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
	protected $mappings = [
		CreateUserCommand::class => CreateUserHandler::class
	];
}
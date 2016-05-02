<?php
// Created by dealloc. All rights reserved.

namespace Festival\Providers;

use Festival\Commands\Artists\CreateArtistCommand;
use Festival\Commands\Handlers\Artists\CreateArtistHandler;
use Festival\Commands\Handlers\News\CreateNewsHandler;
use Festival\Commands\Handlers\Users\CreateUserHandler;
use Festival\Commands\News\CreateNewsCommand;
use Festival\Commands\Users\CreateUserCommand;
use Ichtus\Commands\Providers\CommandServiceProvider as ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
	protected $mappings = [
		CreateUserCommand::class   => CreateUserHandler::class,
		CreateNewsCommand::class   => CreateNewsHandler::class,
		CreateArtistCommand::class => CreateArtistHandler::class,
	];
}
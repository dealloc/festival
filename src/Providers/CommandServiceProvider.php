<?php
// Created by dealloc. All rights reserved.

namespace Festival\Providers;

use Festival\Commands\Artists\CreateArtistCommand;
use Festival\Commands\Handlers\Artists\CreateArtistHandler;
use Festival\Commands\Handlers\News\Comments\CreateCommentHandler;
use Festival\Commands\Handlers\News\CreateNewsHandler;
use Festival\Commands\Handlers\Tickets\CreateTicketHandler;
use Festival\Commands\Handlers\Users\CreateUserHandler;
use Festival\Commands\News\Comments\CreateCommentCommand;
use Festival\Commands\News\CreateNewsCommand;
use Festival\Commands\Tickets\CreateTicketCommand;
use Festival\Commands\Users\CreateUserCommand;
use Ichtus\Commands\Providers\CommandServiceProvider as ServiceProvider;

/**
 * Register commands in the dispatcher runtime.
 *
 * Class CommandServiceProvider
 * @package Festival\Providers
 */
class CommandServiceProvider extends ServiceProvider
{
	protected $mappings = [
		CreateUserCommand::class    => CreateUserHandler::class,
		CreateNewsCommand::class    => CreateNewsHandler::class,
		CreateCommentCommand::class => CreateCommentHandler::class,
		CreateArtistCommand::class  => CreateArtistHandler::class,
		CreateTicketCommand::class  => CreateTicketHandler::class,
	];
}
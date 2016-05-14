<?php
// Created by dealloc. All rights reserved.

namespace Festival\Commands\Handlers\Tickets;

use Festival\Commands\Tickets\CreateTicketCommand;
use Festival\Contracts\Auth\AuthenticateService;
use Festival\Contracts\Repositories\Tickets\TicketRepository;
use Illuminate\Contracts\Auth\Guard;

/**
 * Handler for the CreateTicketCommand.
 *
 * Class CreateTicketHandler
 * @package Festival\Commands\Handlers\Tickets
 */
class CreateTicketHandler
{
	/**
	 * @var \Festival\Contracts\Repositories\Tickets\TicketRepository
	 */
	private $repository;
	/**
	 * @var \Illuminate\Contracts\Auth\Guard
	 */
	private $guard;

	/**
	 * CreateTicketHandler constructor.
	 * 
	 * @param \Festival\Contracts\Repositories\Tickets\TicketRepository $repository
	 */
	public function __construct(TicketRepository $repository, Guard $guard)
	{
		$this->repository = $repository;
		$this->guard = $guard;
	}

	/**
	 * Handle the CreateTicketCommand.
	 *
	 * @param \Festival\Commands\Tickets\CreateTicketCommand $command
	 * @return \Festival\Entities\Tickets\Ticket|null
	 */
	public function handle(CreateTicketCommand $command)
	{
		return $this->repository->create([
			'user_id' => $this->guard->user()->id,
			'token' => uniqid('evento-', true)
		]);
	}
}
<?php
// Created by dealloc. All rights reserved.

namespace Festival\Commands\Handlers\Tickets;

use Festival\Commands\Tickets\CreateTicketCommand;
use Festival\Contracts\Auth\AuthenticateService;
use Festival\Contracts\Repositories\Tickets\TicketRepository;

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
	 * @var \Festival\Contracts\Auth\AuthenticateService
	 */
	private $service;

	/**
	 * CreateTicketHandler constructor.
	 * 
	 * @param \Festival\Contracts\Repositories\Tickets\TicketRepository $repository
	 * @param \Festival\Contracts\Auth\AuthenticateService $service
	 */
	public function __construct(TicketRepository $repository, AuthenticateService $service)
	{
		$this->repository = $repository;
		$this->service = $service;
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
			'user_id' => $this->service->user()->id,
			'token' => uniqid('evento-', true)
		]);
	}
}
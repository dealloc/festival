<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Controllers\Api;

use Festival\Commands\Tickets\CreateTicketCommand;
use Festival\Contracts\Repositories\Tickets\TicketRepository;
use Festival\Http\Controllers\Controller;
use Festival\Http\Requests\Tickets\CreateTicketRequest;
use Illuminate\Contracts\Auth\Guard;

/**
 * Controller for all ticket related API calls.
 *
 * Class TicketsController
 * @package Festival\Http\Controllers\Api
 */
class TicketsController extends Controller
{
	/**
	 * Retrieve all tickets for the authenticated user.
	 *
	 * @param \Festival\Contracts\Repositories\Tickets\TicketRepository $repository
	 * @return \Illuminate\Support\Collection
	 */
	public function index(Guard $guard, TicketRepository $repository)
	{
		return $repository->allForUser($guard->user());
	}

	/**
	 * Purchase a new ticket.
	 *
	 * @param \Festival\Http\Requests\Tickets\CreateTicketRequest $request
	 * @return mixed
	 */
	public function create(CreateTicketRequest $request)
	{
		return $this->execute(new CreateTicketCommand($request));
	}
}
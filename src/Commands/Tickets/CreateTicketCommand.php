<?php
// Created by dealloc. All rights reserved.

namespace Festival\Commands\Tickets;

use Festival\Http\Requests\Tickets\CreateTicketRequest;

/**
 * Command for purchasing a new ticket.
 *
 * Class CreateTicketCommand
 * @package Festival\Commands\Tickets
 */
class CreateTicketCommand
{
	/**
	 * CreateTicketCommand constructor.
	 * 
	 * @param \Festival\Http\Requests\Tickets\CreateTicketRequest $request
	 */
	public function __construct(CreateTicketRequest $request)
	{
	}
}
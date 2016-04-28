<?php
// Created by dealloc. All rights reserved.

namespace Festival\Repositories\Tickets;

use Festival\Contracts\Repositories\Tickets\TicketRepository;
use Festival\Entities\Tickets\Ticket;
use Festival\Repositories\EloquentEntityRepository;

class EloquentTicketRepository extends EloquentEntityRepository implements TicketRepository
{
	public function __construct(Ticket $ticket)
	{
		parent::__construct($ticket);
	}
}
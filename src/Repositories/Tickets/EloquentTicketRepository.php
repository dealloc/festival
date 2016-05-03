<?php
// Created by dealloc. All rights reserved.

namespace Festival\Repositories\Tickets;

use Festival\Contracts\Repositories\Tickets\TicketRepository;
use Festival\Entities\Tickets\Ticket;
use Festival\Entities\Users\User;
use Festival\Repositories\EloquentEntityRepository;

class EloquentTicketRepository extends EloquentEntityRepository implements TicketRepository
{
	public function __construct(Ticket $ticket)
	{
		parent::__construct($ticket);
	}

	public function allForUser(User $user)
	{
		return $this->model->query()->where('user_id', $user->id)->get();
	}
}
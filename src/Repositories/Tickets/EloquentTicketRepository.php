<?php
// Created by dealloc. All rights reserved.

namespace Festival\Repositories\Tickets;

use Festival\Contracts\Repositories\Tickets\TicketRepository;
use Festival\Entities\Tickets\Ticket;
use Festival\Entities\Users\User;
use Festival\Repositories\EloquentEntityRepository;
use Illuminate\Support\Collection;

/**
 * Eloquent implementation for interacting with tickets.
 *
 * Class EloquentTicketRepository
 * @package Festival\Repositories\Tickets
 */
class EloquentTicketRepository extends EloquentEntityRepository implements TicketRepository
{
	/**
	 * EloquentTicketRepository constructor.
	 *
	 * @param \Festival\Entities\Tickets\Ticket $ticket
	 */
	public function __construct(Ticket $ticket)
	{
		parent::__construct($ticket);
	}

	/**
	 * Retrieve all the tickets for a given user.
	 *
	 * @param \Festival\Entities\Users\User $user
	 * @return Collection
	 */
	public function allForUser(User $user)
	{
		return $this->model->query()->where('user_id', $user->id)->get();
	}
}
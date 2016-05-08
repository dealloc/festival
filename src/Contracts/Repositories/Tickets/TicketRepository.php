<?php
// Created by dealloc. All rights reserved.

namespace Festival\Contracts\Repositories\Tickets;

use Festival\Contracts\Repositories\EntityRepository;
use Festival\Entities\Users\User;
use Illuminate\Support\Collection;

/**
 * Generic contract for interacting with ticket entities.
 *
 * Interface TicketRepository
 * @package Festival\Contracts\Repositories\Tickets
 */
interface TicketRepository extends EntityRepository
{
	/**
	 * Retrieve all the tickets for a given user.
	 *
	 * @param \Festival\Entities\Users\User $user
	 * @return Collection
	 */
	public function allForUser(User $user);
}
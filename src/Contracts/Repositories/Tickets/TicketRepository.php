<?php
// Created by dealloc. All rights reserved.

namespace Festival\Contracts\Repositories\Tickets;

use Festival\Contracts\Repositories\EntityRepository;
use Festival\Entities\Users\User;

interface TicketRepository extends EntityRepository
{
	public function allForUser(User $user);
}
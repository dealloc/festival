<?php
// Created by dealloc. All rights reserved.

namespace Festival\Events\Users;

use Festival\Entities\Users\User;
use Festival\Events\Event;

class CreateUserEvent extends Event
{
	/**
	 * @var \Festival\Entities\Users\User
	 */
	private $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * @return User
	 */
	public function getUser()
	{
		return $this->user;
	}
}
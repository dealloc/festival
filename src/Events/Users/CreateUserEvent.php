<?php
// Created by dealloc. All rights reserved.

namespace Festival\Events\Users;

use Festival\Entities\Users\User;
use Festival\Events\Event;

/**
 * Event fired when a new user is created.
 *
 * Class CreateUserEvent
 * @package Festival\Events\Users
 */
class CreateUserEvent extends Event
{
	/**
	 * @var \Festival\Entities\Users\User
	 */
	private $user;

	/**
	 * CreateUserEvent constructor.
	 * 
	 * @param \Festival\Entities\Users\User $user
	 */
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
<?php
// Created by dealloc. All rights reserved.

namespace Festival\Repositories\Users;

use Festival\Contracts\Repositories\Users\UserRepository;
use Festival\Entities\Users\User;
use Festival\Repositories\EloquentEntityRepository;

class EloquentUserRepository extends EloquentEntityRepository implements UserRepository
{
	public function __construct(User $user)
	{
		parent::__construct($user);
	}
}
<?php
// Created by dealloc. All rights reserved.

namespace Festival\Contracts\Repositories\Users;

use Festival\Contracts\Repositories\EntityRepository;

interface UserRepository extends EntityRepository
{
	public function findByMail($email);
}
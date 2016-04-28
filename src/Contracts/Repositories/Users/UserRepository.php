<?php
// Created by dealloc. All rights reserved.

namespace Festival\Contracts\Repositories\Users;

use Festival\Contracts\Repositories\EntityRepository;

interface UserRepository extends EntityRepository
{
	/**
	 * Retrieve a user based on an array of fields and values.
	 *
	 * @param array $fields
	 * @return mixed
	 */
	public function query(array $fields);
}
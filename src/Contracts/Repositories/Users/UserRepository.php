<?php
// Created by dealloc. All rights reserved.

namespace Festival\Contracts\Repositories\Users;

use Festival\Contracts\Repositories\EntityRepository;

/**
 * Generic contract for interacting with user entities.
 *
 * Interface UserRepository
 * @package Festival\Contracts\Repositories\Users
 */
interface UserRepository extends EntityRepository
{
	/**
	 * Find an entity by it's email address.
	 *
	 * @param string $email
	 * @return \Festival\Entities\Users\User|null
	 */
	public function findByMail($email);

	/**
	 * Find an entity by it's secret.
	 *
	 * @param string $secret
	 * @return \Festival\Entities\Users\User|null
	 */
	public function findBySecret($secret);
}
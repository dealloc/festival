<?php
// Created by dealloc. All rights reserved.

namespace Festival\Repositories\Users;

use Festival\Contracts\Repositories\Users\UserRepository;
use Festival\Entities\Users\User;
use Festival\Repositories\EloquentEntityRepository;
use Illuminate\Contracts\Hashing\Hasher;

/**
 * Eloquent implementation for interacting with users.
 *
 * Class EloquentUserRepository
 * @package Festival\Repositories\Users
 */
class EloquentUserRepository extends EloquentEntityRepository implements UserRepository
{
	/**
	 * @var \Illuminate\Contracts\Hashing\Hasher
	 */
	private $hasher;

	/**
	 * EloquentUserRepository constructor.
	 *
	 * @param \Festival\Entities\Users\User $user
	 * @param \Illuminate\Contracts\Hashing\Hasher $hasher
	 */
	public function __construct(User $user, Hasher $hasher)
	{
		parent::__construct($user);
		$this->hasher = $hasher;
	}

	/**
	 * Create a new instance.
	 *
	 * @param array $attributes
	 * @return mixed
	 */
	public function create(array $attributes)
	{
		if ( isset( $attributes[ 'password' ] ) && $this->hasher->needsRehash($attributes[ 'password' ]) )
		{
			$attributes[ 'password' ] = $this->hasher->make($attributes[ 'password' ]);
		}

		$attributes[ 'secret' ] = md5(uniqid('', true));

		return parent::create($attributes);
	}

	/**
	 * Find an entity by it's email address.
	 *
	 * @param string $email
	 * @return \Festival\Entities\Users\User|null
	 */
	public function findByMail($email)
	{
		return $this->model->query()->where('email', $email)->first();
	}

	/**
	 * Find an entity by it's secret.
	 *
	 * @param string $secret
	 * @return \Festival\Entities\Users\User|null
	 */
	public function findBySecret($secret)
	{
		return $this->model->query()->where('secret', $secret)->first();
	}
}
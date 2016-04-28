<?php
// Created by dealloc. All rights reserved.

namespace Festival\Repositories\Users;

use Festival\Contracts\Repositories\Users\UserRepository;
use Festival\Entities\Users\User;
use Festival\Repositories\EloquentEntityRepository;
use Illuminate\Contracts\Hashing\Hasher;

class EloquentUserRepository extends EloquentEntityRepository implements UserRepository
{
	/**
	 * @var \Illuminate\Contracts\Hashing\Hasher
	 */
	private $hasher;

	public function __construct(User $user, Hasher $hasher)
	{
		parent::__construct($user);
		$this->hasher = $hasher;
	}

	public function create(array $attributes)
	{
		if ( isset( $attributes[ 'password' ] ) && $this->hasher->needsRehash($attributes[ 'password' ]) )
		{
			$attributes[ 'password' ] = $this->hasher->make($attributes[ 'password' ]);
		}

		$attributes[ 'secret' ] = md5(uniqid('', true));

		return parent::create($attributes);
	}
}
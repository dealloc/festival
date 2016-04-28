<?php
// Created by dealloc. All rights reserved.

namespace Festival\Auth;

use Festival\Contracts\Auth\AuthenticateService as AuthContract;
use Festival\Contracts\Repositories\Users\UserRepository;

class EloquentAuthenticateService implements AuthContract
{
	/**
	 * @var \Festival\Contracts\Repositories\Users\UserRepository
	 */
	private $repository;
	private $user;

	public function __construct(UserRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * Check authentication credentials.
	 *
	 * @param array $credentials
	 * @return boolean
	 */
	public function login(array $credentials)
	{
		if ( ! array_key_exists('email', $credentials) || ! array_key_exists('password', $credentials) )
			return false;

		$this->user = $this->repository->query($credentials);

		return ( ! is_null($this->user) );
	}

	public function user()
	{
		return $this->user;
	}

	public function guest()
	{
		return ( is_null($this->user) );
	}

	/**
	 * Check if the token is a valid user token.
	 *
	 * @param $token
	 * @return boolean
	 */
	public function authenticate($token)
	{
		$this->user = $this->repository->query([ 'secret' => $token ]);

		return ( ! is_null($this->user) );
	}
}
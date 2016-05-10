<?php
// Created by dealloc. All rights reserved.

namespace Festival\Auth;

use Festival\Contracts\Auth\AuthenticateService as AuthContract;
use Festival\Contracts\Repositories\Users\UserRepository;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Hashing\Hasher;

/**
 * Provides an Eloquent implementation of the Authentication service.
 *
 * Class EloquentAuthenticateService
 * @package Festival\Auth
 */
class EloquentAuthenticateService implements AuthContract
{
	/**
	 * @var \Festival\Contracts\Repositories\Users\UserRepository
	 */
	private $repository;
	private $user;
	/**
	 * @var \Illuminate\Contracts\Hashing\Hasher
	 */
	private $hasher;
	/**
	 * @var \Illuminate\Contracts\Auth\Guard
	 */
	private $guard;

	/**
	 * EloquentAuthenticateService constructor.
	 * 
	 * @param \Festival\Contracts\Repositories\Users\UserRepository $repository
	 * @param \Illuminate\Contracts\Hashing\Hasher $hasher
	 * @param \Illuminate\Contracts\Auth\Guard $guard
	 */
	public function __construct(UserRepository $repository, Hasher $hasher, Guard $guard)
	{
		$this->repository = $repository;
		$this->hasher = $hasher;
		$this->guard = $guard;
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

		$this->user = $this->repository->findByMail($credentials[ 'email' ]);

		if ( is_null($this->user) || ! $this->hasher->check($credentials[ 'password' ], $this->user->password) )
		{
			$this->user = null;

			return false;
		}
		
		$this->user->secret = $this->refresh();
		$this->user->save();
		$this->guard->setUser($this->user);

		return true;
	}

	/**
	 * Get the currently authenticated user.
	 *
	 * @return \Festival\Entities\Users\User|null
	 */
	public function user()
	{
		return $this->user;
	}

	/**
	 * Check if no user is currently authenticated.
	 *
	 * @return boolean Returns true if no user is authenticated, false if there's an authenticated user.
	 */
	public function guest()
	{
		return ( is_null($this->user()) );
	}

	/**
	 * Check if the token is a valid user token.
	 *
	 * @param string $token
	 * @return boolean
	 */
	public function authenticate($token)
	{
		$this->user = $this->repository->findBySecret($token);
		if ( ! is_null($this->user()) )
			$this->guard->setUser($this->user);

		return ( ! is_null($this->user()) );
	}

	/**
	 * Generate an authentication token.
	 *
	 * @return string
	 */
	public function refresh()
	{
		return md5(uniqid());
	}
}
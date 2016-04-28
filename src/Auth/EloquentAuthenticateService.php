<?php
// Created by dealloc. All rights reserved.

namespace Festival\Auth;

use Festival\Contracts\Auth\AuthenticateService as AuthContract;

class EloquentAuthenticateService implements AuthContract
{
	/**
	 * Check authentication credentials.
	 *
	 * @param array $credentials
	 * @return boolean
	 */
	public function login(array $credentials)
	{
		// TODO: Implement login() method.
	}

	public function user()
	{
		// TODO: Implement user() method.
	}

	public function guest()
	{
		// TODO: Implement guest() method.
	}

	/**
	 * Check if the token is a valid user token.
	 *
	 * @param $token
	 * @return boolean
	 */
	public function authenticate($token)
	{
		// TODO: Implement authenticate() method.
	}
}
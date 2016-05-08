<?php
// Created by dealloc. All rights reserved.

namespace Festival\Contracts\Auth;

/**
 * Provides generic behaviour for an authentication service.
 *
 * Interface AuthenticateService
 * @package Festival\Contracts\Auth
 */
interface AuthenticateService
{
	/**
	 * Check authentication credentials.
	 *
	 * @param array $credentials
	 * @return boolean
	 */
	public function login(array $credentials);

	/**
	 * Get the currently authenticated user.
	 *
	 * @return \Festival\Entities\Users\User|null
	 */
	public function user();

	/**
	 * Check if no user is currently authenticated.
	 *
	 * @return boolean Returns true if no user is authenticated, false if there's an authenticated user.
	 */
	public function guest();

	/**
	 * Check if the token is a valid user token.
	 *
	 * @param string $token
	 * @return boolean
	 */
	public function authenticate($token);

	/**
	 * Generate an authentication token.
	 *
	 * @return string
	 */
	public function refresh();
}
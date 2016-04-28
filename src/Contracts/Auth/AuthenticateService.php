<?php
// Created by dealloc. All rights reserved.

namespace Festival\Contracts\Auth;

interface AuthenticateService
{
	/**
	 * Check authentication credentials.
	 *
	 * @param array $credentials
	 * @return boolean
	 */
	public function login(array $credentials);

	public function user();

	public function guest();

	/**
	 * Check if the token is a valid user token.
	 *
	 * @param $token
	 * @return boolean
	 */
	public function authenticate($token);
}
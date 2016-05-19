<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Controllers\Api;

use Festival\Http\Requests\Auth\AuthenticateRequest;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Festival\Http\Controllers\Controller;
use Festival\Commands\Users\CreateUserCommand;
use Festival\Http\Requests\Users\CreateUserRequest;
use Festival\Exceptions\Auth\InvalidCredentialsException;

/**
 * Controller for all auth related API requests.
 *
 * Class AuthController
 * @package Festival\Http\Controllers\Api
 */
class AuthController extends Controller
{
	/**
	 * Register a new user.
	 *
	 * @param \Festival\Http\Requests\Users\CreateUserRequest $request
	 * @return mixed
	 */
	public function register(CreateUserRequest $request)
	{
		return $this->execute(new CreateUserCommand($request));
	}

	/**
	 * Authenticate a user.
	 *
	 * @param \Festival\Http\Requests\Auth\AuthenticateRequest $request
	 * @param \Illuminate\Contracts\Auth\Guard $guard
	 * @return array
	 * @throws \Festival\Exceptions\Auth\InvalidCredentialsException
	 */
	public function login(AuthenticateRequest $request, Guard $guard)
	{
		if ( ! $guard->attempt($request->only('email', 'password')) )
			throw new InvalidCredentialsException;

		return $guard->user();
	}
}
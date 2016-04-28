<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Controllers\Api;

use Illuminate\Http\Request;
use Festival\Http\Controllers\Controller;
use Festival\Commands\Users\CreateUserCommand;
use Festival\Contracts\Auth\AuthenticateService;
use Festival\Http\Requests\Users\CreateUserRequest;
use Festival\Exceptions\Auth\InvalidCredentialsException;

class AuthController extends Controller
{
	public function register(CreateUserRequest $request)
	{
		return $this->execute(new CreateUserCommand($request));
	}

	public function login(Request $request, AuthenticateService $service)
	{
		if ( ! $service->login($request->all()) )
			throw new InvalidCredentialsException;

		return [ 'token' => $service->user()->secret ];
	}
}
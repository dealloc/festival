<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Controllers\Api;

use Festival\Http\Controllers\Controller;
use Festival\Commands\Users\CreateUserCommand;
use Festival\Http\Requests\Users\CreateUserRequest;

class AuthController extends Controller
{
	public function register(CreateUserRequest $request)
	{
		return $this->execute(new CreateUserCommand($request));
	}
}
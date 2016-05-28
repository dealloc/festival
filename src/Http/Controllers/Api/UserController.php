<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Controllers\Api;

use Festival\Contracts\Auth\AuthenticateService;
use Festival\Http\Controllers\Controller;
use Festival\Http\Requests\Users\UpdateUserRequest;

class UserController extends Controller
{
	public function get(AuthenticateService $service)
	{
		return $service->user();
	}

	public function update(UpdateUserRequest $request)
	{
		return [];
	}
}
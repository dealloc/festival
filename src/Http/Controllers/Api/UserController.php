<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Controllers\Api;

use Festival\Http\Controllers\Controller;
use Festival\Http\Requests\Users\UpdateUserRequest;
use Illuminate\Contracts\Auth\Guard;

class UserController extends Controller
{
    public function get(Guard $guard)
    {
        return $guard->user();
    }

    public function update(UpdateUserRequest $request, Guard $guard)
    {
        return $request->all();
    }
}
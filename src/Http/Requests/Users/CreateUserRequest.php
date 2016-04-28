<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Requests\Users;


use Festival\Http\Requests\Request;

class CreateUserRequest extends Request
{
	public function rules()
	{
		return [
			'fname'    => 'required',
			'lname'    => 'required',
			'email'    => 'required|email|unique:users',
			'password' => 'required|confirmed|min:5',
		];
	}
}
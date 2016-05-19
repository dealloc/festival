<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Requests\Auth;

use Festival\Http\Requests\Request;

class AuthenticateRequest extends Request
{
	/**
	 * Define the rules for validating this request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'email'    => 'required|string',
			'password' => 'required|string',
		];
	}
}
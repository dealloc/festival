<?php
// Created by dealloc. All rights reserved.

namespace Festival\Exceptions\Auth;

class InvalidCredentialsException extends \Exception
{
	public function __construct($message = 'Invalid credentials')
	{
		parent::__construct($message);
	}
}
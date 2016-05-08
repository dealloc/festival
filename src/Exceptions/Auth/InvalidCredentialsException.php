<?php
// Created by dealloc. All rights reserved.

namespace Festival\Exceptions\Auth;

/**
 * Exception thrown when the user attempts to authenticate with invalid credentials.
 *
 * Class InvalidCredentialsException
 * @package Festival\Exceptions\Auth
 */
class InvalidCredentialsException extends \Exception
{
	/**
	 * InvalidCredentialsException constructor.
	 * 
	 * @param string $message
	 */
	public function __construct($message = 'Invalid credentials')
	{
		parent::__construct($message);
	}
}
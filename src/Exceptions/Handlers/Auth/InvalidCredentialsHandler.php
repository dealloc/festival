<?php
// Created by dealloc. All rights reserved.

namespace Festival\Exceptions\Handlers\Auth;

use Ichtus\Exceptions\Contracts\Handlers\Handler;
use Festival\Exceptions\Auth\InvalidCredentialsException;

/**
 * Handler for the InvalidCredentialsException.
 *
 * Class InvalidCredentialsHandler
 * @package Festival\Exceptions\Handlers\Auth
 */
class InvalidCredentialsHandler implements Handler
{
	/**
	 * Handle the exception accordingly.
	 *
	 * @param InvalidCredentialsException $exception The exception that was thrown.
	 * @return \Illuminate\Http\Response A response for the handled exception.
	 */
	public function handle($exception)
	{
		return response()->json([
			'error' => 'Unauthorized access',
			'error_code' => 401,
			'reason' => $exception->getMessage()
		], 401);
	}
}
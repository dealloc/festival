<?php
// Created by dealloc. All rights reserved.

namespace Festival\Exceptions\Handlers;


use Ichtus\Exceptions\Contracts\Handlers\Handler;
use Illuminate\Http\Exception\HttpResponseException;

class HttpExceptionHandler implements Handler
{
	/**
	 * Handle the exception accordingly.
	 *
	 * @param HttpResponseException $exception The exception that was thrown.
	 * @return \Illuminate\Http\Response A response for the handled exception.
	 */
	public function handle($exception)
	{
		$reason = json_decode($exception->getResponse()->getContent(), true);

		return response()->json([
			'error' => 'validation failed',
			'error_code' => $exception->getResponse()->getStatusCode(),
			'reason' => $reason
		]);
	}
}
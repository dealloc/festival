<?php
// Created by dealloc. All rights reserved.

namespace Festival\Exceptions\Handlers;


use Ichtus\Exceptions\Contracts\Handlers\Handler;
use Illuminate\Http\Exception\HttpResponseException;

/**
 * Handler for the HttpResponseException.
 *
 * Class HttpExceptionHandler
 * @package Festival\Exceptions\Handlers
 */
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
		$code = $exception->getResponse()->getStatusCode();

		if ($code == 422)
			return $this->failedValidation($exception);
		else if ($code == 403)
			return $this->failedAuthorization($exception);
	}

	/**
	 * Handle the exception as a validation failed exception.
	 *
	 * @param \Illuminate\Http\Exception\HttpResponseException $exception
	 * @return \Illuminate\Http\Response
	 */
	private function failedValidation(HttpResponseException $exception)
	{
		$reason = json_decode($exception->getResponse()->getContent(), true);

		return response()->json([
			'error' => 'Validation failed',
			'error_code' => $exception->getResponse()->getStatusCode(),
			'reason' => $reason
		], 422);
	}

	/**
	 * Handl the exception as an authorization failed exception.
	 *
	 * @param \Illuminate\Http\Exception\HttpResponseException $exception
	 * @return \Illuminate\Http\Response
	 */
	private function failedAuthorization(HttpResponseException $exception)
	{
		return response()->json([
			'error' => 'Authorization failed',
			'error_code' => $exception->getResponse()->getStatusCode(),
		], 403);
	}
}
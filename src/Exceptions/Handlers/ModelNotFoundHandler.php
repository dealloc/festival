<?php
// Created by dealloc. All rights reserved.

namespace Festival\Exceptions\Handlers;


use Ichtus\Exceptions\Contracts\Handlers\Handler;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ModelNotFoundHandler implements Handler
{
	/**
	 * Handle the exception accordingly.
	 *
	 * @param ModelNotFoundException $exception The exception that was thrown.
	 * @return \Illuminate\Http\Response A response for the handled exception.
	 */
	public function handle($exception)
	{
		return response()->json([
			'error' => 'Not found',
			'error_code' => 404
		], 404);
	}
}
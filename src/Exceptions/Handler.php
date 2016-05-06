<?php

namespace Festival\Exceptions;

use Exception;
use Festival\Exceptions\Auth\InvalidCredentialsException;
use Festival\Exceptions\Handlers\Auth\InvalidCredentialsHandler;
use Festival\Exceptions\Handlers\HttpExceptionHandler;
use Festival\Exceptions\Handlers\ModelNotFoundHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Ichtus\Exceptions\Dispatchers\Dispatcher as DispatchesExceptions;

class Handler extends ExceptionHandler
{
	use DispatchesExceptions;

	protected $handlers = [
		HttpResponseException::class       => HttpExceptionHandler::class,
		InvalidCredentialsException::class => InvalidCredentialsHandler::class,
		ModelNotFoundException::class      => ModelNotFoundHandler::class,
	];

	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		AuthorizationException::class,
		HttpException::class,
		ModelNotFoundException::class,
		ValidationException::class,
		InvalidCredentialsException::class,
	];

	/**
	 * Report or log an exception.
	 *
	 * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
	 *
	 * @param  \Exception $e
	 * @return void
	 */
	public function report(Exception $e)
	{
		parent::report($e);
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Exception $e
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $e)
	{
		return $this->dispatch($e);
	}

	/**
	 * Called by the dispatcher when an exception isn't handled.
	 *
	 * @param \Exception $exception
	 * @return mixed
	 */
	public function unhandled(\Exception $exception)
	{
		return parent::render(null, $exception);
	}
}

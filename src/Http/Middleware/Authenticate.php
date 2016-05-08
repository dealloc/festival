<?php

namespace Festival\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Festival\Contracts\Auth\AuthenticateService;
use Festival\Exceptions\Auth\InvalidCredentialsException;

/**
 * HTTP middleware responsible for filtering unauthenticated requests.
 *
 * Class Authenticate
 * @package Festival\Http\Middleware
 */
class Authenticate
{
	/**
	 * @var \Festival\Contracts\Auth\AuthenticateService
	 */
	private $service;

	/**
	 * Authenticate constructor.
	 * 
	 * @param \Festival\Contracts\Auth\AuthenticateService $service
	 */
	public function __construct(AuthenticateService $service)
	{
		$this->service = $service;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @param  string|null $guard
	 * @return mixed
	 * @throws \Festival\Exceptions\Auth\InvalidCredentialsException
	 */
	public function handle(Request $request, Closure $next, $guard = null)
	{
		if ( ! $this->service->authenticate($request->header('Authorization')) )
			throw new InvalidCredentialsException;

		return $next($request);
	}
}

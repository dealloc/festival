<?php

namespace Festival\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
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
	 * @var \Illuminate\Contracts\Auth\Guard
	 */
	private $guard;

	/**
	 * Authenticate constructor.
	 *
	 * @param \Illuminate\Contracts\Auth\Guard $guard
	 */
	public function __construct(Guard $guard)
	{
		$this->guard = $guard;
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
		if ( $this->guard->guest() )
			throw new InvalidCredentialsException;

		return $next($request);
	}
}

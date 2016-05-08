<?php

namespace Festival\Http\Requests;

use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Basic HTTP request that can be validated and authorized.
 *
 * Class Request
 * @package Festival\Http\Requests
 */
abstract class Request extends FormRequest
{
	/**
	 * Check if the request is allowed to execute.
	 *
	 * @param \Illuminate\Contracts\Auth\Access\Gate $gate
	 * @return bool
	 */
	public function authorize(Gate $gate)
	{
		return true;
    }

	/**
	 * Define the rules for validating this request.
	 *
	 * @return array
	 */
	abstract public function rules();
}

<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Requests\Artists;

use Festival\Http\Requests\Request;
use Illuminate\Contracts\Auth\Access\Gate;

/**
 * Request for validating and authorizing request to create new artist.
 *
 * Class CreateArtistRequest
 * @package Festival\Http\Requests\Artists
 */
class CreateArtistRequest extends Request
{
	/**
	 * Check if the request is allowed to execute.
	 *
	 * @param \Illuminate\Contracts\Auth\Access\Gate $gate
	 * @return bool
	 */
	public function authorize(Gate $gate)
	{
		return $gate->allows('create-artist');
	}

	/**
	 * Define the rules for validating this request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name'        => 'required|string',
			'description' => 'required|string',
			'start'       => 'required|date|before:end|after:now',
			'end'         => 'required|date|after:start',
			'image'       => 'required|string|url',
		];
	}
}
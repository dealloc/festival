<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Requests\Artists;

use Festival\Http\Requests\Request;
use Illuminate\Contracts\Auth\Access\Gate;

class CreateArtistRequest extends Request
{
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
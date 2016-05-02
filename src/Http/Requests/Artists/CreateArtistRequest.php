<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Requests\Artists;

use Festival\Http\Requests\Request;

class CreateArtistRequest extends Request
{
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
			'start'       => 'required|date',
			'end'         => 'required|date',
			'image'       => 'required|string',
		];
	}
}
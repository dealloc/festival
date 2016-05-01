<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Requests\News;

use Festival\Http\Requests\Request;

class CreateNewsRequest extends Request
{
	/**
	 * Define the rules for validating this request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title' => 'required|string',
			'content' => 'required|string'
		];
	}
}
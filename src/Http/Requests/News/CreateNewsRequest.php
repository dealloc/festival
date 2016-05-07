<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Requests\News;

use Festival\Http\Requests\Request;
use Illuminate\Contracts\Auth\Access\Gate;

class CreateNewsRequest extends Request
{
	public function authorize(Gate $gate)
	{
		return $gate->check('news.create');
	}

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
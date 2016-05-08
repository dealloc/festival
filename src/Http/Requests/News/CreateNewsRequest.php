<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Requests\News;

use Festival\Http\Requests\Request;
use Illuminate\Contracts\Auth\Access\Gate;

/**
 * Request for validating and authorizing request to create a news article.
 *
 * Class CreateNewsRequest
 * @package Festival\Http\Requests\News
 */
class CreateNewsRequest extends Request
{
	/**
	 * Check if the request is allowed to execute.
	 *
	 * @param \Illuminate\Contracts\Auth\Access\Gate $gate
	 * @return bool
	 */
	public function authorize(Gate $gate)
	{
		return $gate->allows('news.create');
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
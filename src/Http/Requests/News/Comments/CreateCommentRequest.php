<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Requests\News\Comments;

use Festival\Http\Requests\Request;

/**
 * Request for validating and authorizing request to create a new comment.
 *
 * Class CreateCommentRequest
 * @package Festival\Http\Requests\News\Comments
 */
class CreateCommentRequest extends Request
{
	/**
	 * Define the rules for validating this request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'content' => 'required|string'
		];
	}
}
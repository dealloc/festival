<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Controllers\Api;

use Festival\Commands\News\Comments\CreateCommentCommand;
use Festival\Entities\News\News;
use Festival\Http\Controllers\Controller;
use Festival\Http\Requests\News\Comments\CreateCommentRequest;

/**
 * Controller for all comment related API calls.
 *
 * Class CommentController
 * @package Festival\Http\Controllers\Api
 */
class CommentController extends Controller
{
	/**
	 * Create a new comment.
	 *
	 * @param \Festival\Http\Requests\News\Comments\CreateCommentRequest $request
	 * @param \Festival\Entities\News\News $article
	 * @return mixed
	 */
	public function create(CreateCommentRequest $request, News $article)
	{
		return $this->execute(new CreateCommentCommand($request, $article));
	}
}
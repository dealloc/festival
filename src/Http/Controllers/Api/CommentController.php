<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Controllers\Api;

use Festival\Entities\News\News;
use Festival\Http\Controllers\Controller;
use Festival\Http\Requests\News\Comments\CreateCommentRequest;

class CommentController extends Controller
{
	public function create(CreateCommentRequest $request, News $article)
	{
	}
}
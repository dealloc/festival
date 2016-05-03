<?php
// Created by dealloc. All rights reserved.

namespace Festival\Repositories\News\Comments;

use Festival\Contracts\Repositories\News\Comments\CommentRepository;
use Festival\Entities\News\Comments\Comment;
use Festival\Repositories\EloquentEntityRepository;

class EloquentCommentRepository extends EloquentEntityRepository implements CommentRepository
{
	public function __construct(Comment $model)
	{
		parent::__construct($model);
	}
}
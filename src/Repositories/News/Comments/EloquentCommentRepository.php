<?php
// Created by dealloc. All rights reserved.

namespace Festival\Repositories\News\Comments;

use Festival\Contracts\Repositories\News\Comments\CommentRepository;
use Festival\Entities\News\Comments\Comment;
use Festival\Repositories\EloquentEntityRepository;

/**
 * Eloquent implementation for interacting with comments.
 *
 * Class EloquentCommentRepository
 * @package Festival\Repositories\News\Comments
 */
class EloquentCommentRepository extends EloquentEntityRepository implements CommentRepository
{
	/**
	 * EloquentCommentRepository constructor.
	 * 
	 * @param \Festival\Entities\News\Comments\Comment $model
	 */
	public function __construct(Comment $model)
	{
		parent::__construct($model);
	}
}
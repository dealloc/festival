<?php
// Created by dealloc. All rights reserved.

namespace Festival\Commands\News\Comments;

use Festival\Entities\News\News;
use Festival\Http\Requests\News\Comments\CreateCommentRequest;

/**
 * Command for creating a new comment.
 *
 * Class CreateCommentCommand
 * @package Festival\Commands\News\Comments
 */
class CreateCommentCommand
{
	private $content;
	/**
	 * @var \Festival\Entities\News\News
	 */
	private $article;

	/**
	 * CreateCommentCommand constructor.
	 * 
	 * @param \Festival\Http\Requests\News\Comments\CreateCommentRequest $request
	 * @param \Festival\Entities\News\News $article
	 */
	public function __construct(CreateCommentRequest $request, News $article)
	{
		$this->content = $request->get('content');
		$this->article = $article;
	}

	/**
	 * @return string
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * @return News
	 */
	public function getArticle()
	{
		return $this->article;
	}
}
<?php
// Created by dealloc. All rights reserved.

namespace Festival\Commands\Handlers\News\Comments;

use Festival\Commands\News\Comments\CreateCommentCommand;
use Festival\Contracts\Auth\AuthenticateService;
use Festival\Contracts\Repositories\News\Comments\CommentRepository;
use Illuminate\Contracts\Auth\Guard;

/**
 * Handler for the CreateCommentCommand.
 *
 * Class CreateCommentHandler
 * @package Festival\Commands\Handlers\News\Comments
 */
class CreateCommentHandler
{
	/**
	 * @var \Festival\Contracts\Repositories\News\Comments\CommentRepository
	 */
	private $repository;
	/**
	 * @var \Illuminate\Contracts\Auth\Guard
	 */
	private $guard;

	/**
	 * CreateCommentHandler constructor.
	 *
	 * @param \Festival\Contracts\Repositories\News\Comments\CommentRepository $repository
	 * @param \Illuminate\Contracts\Auth\Guard $guard
	 */
	public function __construct(CommentRepository $repository, Guard $guard)
	{
		$this->repository = $repository;
		$this->guard = $guard;
	}

	/**
	 * Handle the CreateCommentCommand.
	 *
	 * @param \Festival\Commands\News\Comments\CreateCommentCommand $command
	 * @return \Festival\Entities\News\Comments\Comment|null
	 */
	public function handle(CreateCommentCommand $command)
	{
		return $this->repository->create([
			'user_id' => $this->guard->user()->id,
			'news_id' => $command->getArticle()->id,
			'content' => $command->getContent()
		]);
	}
}
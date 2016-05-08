<?php
// Created by dealloc. All rights reserved.

namespace Festival\Commands\Handlers\News\Comments;

use Festival\Commands\News\Comments\CreateCommentCommand;
use Festival\Contracts\Auth\AuthenticateService;
use Festival\Contracts\Repositories\News\Comments\CommentRepository;

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
	 * @var \Festival\Contracts\Auth\AuthenticateService
	 */
	private $service;

	/**
	 * CreateCommentHandler constructor.
	 * 
	 * @param \Festival\Contracts\Repositories\News\Comments\CommentRepository $repository
	 * @param \Festival\Contracts\Auth\AuthenticateService $service
	 */
	public function __construct(CommentRepository $repository, AuthenticateService $service)
	{
		$this->repository = $repository;
		$this->service = $service;
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
			'user_id' => $this->service->user()->id,
			'news_id' => $command->getArticle()->id,
			'content' => $command->getContent()
		]);
	}
}
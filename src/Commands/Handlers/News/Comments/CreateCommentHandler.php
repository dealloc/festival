<?php
// Created by dealloc. All rights reserved.

namespace Festival\Commands\Handlers\News\Comments;

use Festival\Commands\News\Comments\CreateCommentCommand;
use Festival\Contracts\Auth\AuthenticateService;
use Festival\Contracts\Repositories\News\Comments\CommentRepository;

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

	public function __construct(CommentRepository $repository, AuthenticateService $service)
	{
		$this->repository = $repository;
		$this->service = $service;
	}

	public function handle(CreateCommentCommand $command)
	{
		return $this->repository->create([
			'user_id' => $this->service->user()->id,
			'news_id' => $command->getArticle()->id,
			'content' => $command->getContent()
		]);
	}
}
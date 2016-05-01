<?php
// Created by dealloc. All rights reserved.

namespace Festival\Commands\Handlers\News;

use Festival\Commands\News\CreateNewsCommand;
use Festival\Contracts\Auth\AuthenticateService;
use Festival\Contracts\Repositories\NewsItems\NewsItemRepository;

class CreateNewsHandler
{
	/**
	 * @var \Festival\Commands\News\CreateNewsCommand
	 */
	private $command;
	/**
	 * @var \Festival\Contracts\Repositories\NewsItems\NewsItemRepository
	 */
	private $repository;
	/**
	 * @var \Festival\Contracts\Auth\AuthenticateService
	 */
	private $auth;

	public function __construct(CreateNewsCommand $command, NewsItemRepository $repository, AuthenticateService $auth)
	{
		$this->command = $command;
		$this->repository = $repository;
		$this->auth = $auth;
	}

	public function handle()
	{
		$news = $this->repository->create([
			'title' => $this->command->getTitle(),
			'content' => $this->command->getContent(),
			'user_id' => $this->auth->user()->id
		]);

		return $news;
	}
}
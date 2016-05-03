<?php
// Created by dealloc. All rights reserved.

namespace Festival\Commands\Handlers\News;

use Festival\Commands\News\CreateNewsCommand;
use Festival\Contracts\Auth\AuthenticateService;
use Festival\Contracts\Repositories\News\NewsRepository;

class CreateNewsHandler
{
	/**
	 * @var \Festival\Commands\News\CreateNewsCommand
	 */
	private $command;
	/**
	 * @var \Festival\Contracts\Repositories\News\NewsRepository
	 */
	private $repository;
	/**
	 * @var \Festival\Contracts\Auth\AuthenticateService
	 */
	private $auth;

	public function __construct(CreateNewsCommand $command, NewsRepository $repository, AuthenticateService $auth)
	{
		$this->command = $command;
		$this->repository = $repository;
		$this->auth = $auth;
	}

	public function handle()
	{
		$news = $this->repository->create([
			'identifier' => md5(uniqid()),
			'title' => $this->command->getTitle(),
			'content' => $this->command->getContent(),
			'user_id' => $this->auth->user()->id
		]);

		return $news;
	}
}
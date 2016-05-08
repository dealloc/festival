<?php
// Created by dealloc. All rights reserved.

namespace Festival\Commands\Handlers\News;

use Festival\Commands\News\CreateNewsCommand;
use Festival\Contracts\Auth\AuthenticateService;
use Festival\Contracts\Repositories\News\NewsRepository;

/**
 * Handler for the CreateNewsCommand.
 *
 * Class CreateNewsHandler
 * @package Festival\Commands\Handlers\News
 */
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

	/**
	 * CreateNewsHandler constructor.
	 * 
	 * @param \Festival\Commands\News\CreateNewsCommand $command
	 * @param \Festival\Contracts\Repositories\News\NewsRepository $repository
	 * @param \Festival\Contracts\Auth\AuthenticateService $auth
	 */
	public function __construct(CreateNewsCommand $command, NewsRepository $repository, AuthenticateService $auth)
	{
		$this->command = $command;
		$this->repository = $repository;
		$this->auth = $auth;
	}

	/**
	 * Handle the CreateNewsCommand.
	 *
	 * @return \Festival\Entities\News\News|null
	 */
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
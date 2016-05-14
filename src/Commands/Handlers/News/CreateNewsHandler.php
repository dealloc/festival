<?php
// Created by dealloc. All rights reserved.

namespace Festival\Commands\Handlers\News;

use Festival\Commands\News\CreateNewsCommand;
use Festival\Contracts\Auth\AuthenticateService;
use Festival\Contracts\Repositories\News\NewsRepository;
use Illuminate\Contracts\Auth\Guard;

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
	 * @var \Illuminate\Contracts\Auth\Guard
	 */
	private $guard;

	/**
	 * CreateNewsHandler constructor.
	 *
	 * @param \Festival\Commands\News\CreateNewsCommand $command
	 * @param \Festival\Contracts\Repositories\News\NewsRepository $repository
	 * @param \Illuminate\Contracts\Auth\Guard $guard
	 */
	public function __construct(CreateNewsCommand $command, NewsRepository $repository, Guard $guard)
	{
		$this->command = $command;
		$this->repository = $repository;
		$this->guard = $guard;
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
			'user_id' => $this->guard->user()->id
		]);

		return $news;
	}
}
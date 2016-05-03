<?php
// Created by dealloc. All rights reserved.

namespace Festival\Commands\Handlers\Users;

use Festival\Commands\Users\CreateUserCommand;
use Festival\Contracts\Repositories\Users\UserRepository;
use Festival\Events\Users\CreateUserEvent;
use Illuminate\Contracts\Events\Dispatcher;

class CreateUserHandler
{
	/**
	 * @var \Festival\Contracts\Repositories\Users\UserRepository
	 */
	private $repository;
	/**
	 * @var \Illuminate\Contracts\Events\Dispatcher
	 */
	private $dispatcher;

	public function __construct(UserRepository $repository, Dispatcher $dispatcher)
	{
		$this->repository = $repository;
		$this->dispatcher = $dispatcher;
	}

	public function handle(CreateUserCommand $command)
	{
		$user = $this->repository->create([
			'fname'    => $command->getFirstName(),
			'lname'    => $command->getLastName(),
			'email'    => $command->getEmail(),
			'password' => $command->getPassword(),
		]);

		$this->dispatcher->fire(new CreateUserEvent($user));

		return [ 'token' => $user->secret ];
	}
}
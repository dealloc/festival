<?php
// Created by dealloc. All rights reserved.

namespace Festival\Commands\Handlers\Users;

use Festival\Commands\Users\CreateUserCommand;
use Festival\Contracts\Repositories\Users\UserRepository;
use Festival\Events\Users\CreateUserEvent;
use Illuminate\Contracts\Events\Dispatcher;

/**
 * Handler for the CreateUserCommand.
 *
 * Class CreateUserHandler
 * @package Festival\Commands\Handlers\Users
 */
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

	/**
	 * CreateUserHandler constructor.
	 * 
	 * @param \Festival\Contracts\Repositories\Users\UserRepository $repository
	 * @param \Illuminate\Contracts\Events\Dispatcher $dispatcher
	 */
	public function __construct(UserRepository $repository, Dispatcher $dispatcher)
	{
		$this->repository = $repository;
		$this->dispatcher = $dispatcher;
	}

	/**
	 * Handle the CreateUserCommand.
	 *
	 * @param \Festival\Commands\Users\CreateUserCommand $command
	 * @return array
	 */
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
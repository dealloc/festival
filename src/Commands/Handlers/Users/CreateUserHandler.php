<?php
// Created by dealloc. All rights reserved.

namespace Festival\Commands\Handlers\Users;

use Festival\Commands\Users\CreateUserCommand;
use Festival\Contracts\Repositories\Users\UserRepository;

class CreateUserHandler
{
	/**
	 * @var \Festival\Contracts\Repositories\Users\UserRepository
	 */
	private $repository;

	public function __construct(UserRepository $repository)
	{
		$this->repository = $repository;
	}

	public function handle(CreateUserCommand $command)
	{
		$user = $this->repository->create([
			'fname'    => $command->getFirstName(),
			'lname'    => $command->getLastName(),
			'email'    => $command->getEmail(),
			'password' => $command->getPassword(),
		]);

		return [ 'token' => $user->secret ];
	}
}
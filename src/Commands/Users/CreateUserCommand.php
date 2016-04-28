<?php
// Created by dealloc. All rights reserved.

namespace Festival\Commands\Users;

use Festival\Http\Requests\Users\CreateUserRequest;

class CreateUserCommand
{
	private $fname;
	private $lname;
	private $email;
	private $password;

	public function __construct(CreateUserRequest $request)
	{
		$this->fname = $request->get('fname');
		$this->lname = $request->get('lname');
		$this->email = $request->get('email');
		$this->password = $request->get('password');
	}

	/**
	 * @return string
	 */
	public function getFirstName()
	{
		return $this->fname;
	}

	/**
	 * @return string
	 */
	public function getLastName()
	{
		return $this->lname;
	}
	
	/**
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
	}
	
	/**
	 * @return string
	 */
	public function getPassword()
	{
		return $this->password;
	}
}
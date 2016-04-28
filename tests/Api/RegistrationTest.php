<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationTest extends TestCase
{
	use DatabaseMigrations;

	public function testValidRegistration()
	{
		$user = [
			'fname'                 => 'Wannes',
			'lname'                 => 'Gennar',
			'email'                 => 'foo@bar.com',
			'password'              => 12345,
			'password_confirmation' => 12345,
		];

		$this->postJson('/api/register', $user)
			->seeStatusCode(200)
			->seeJson()
			->seeInDatabase('users', array_except($user, [ 'password', 'password_confirmation' ]));
	}

	public function testWithoutFname()
	{
		$this->fail('Not implemented yet!');
	}

	public function testWithoutLname()
	{
		$this->fail('Not implemented yet!');
	}

	public function testWithoutEmail()
	{
		$this->fail('Not implemented yet!');
	}

	public function testWithoutPassword()
	{
		$this->fail('Not implemented yet!');
	}

	public function testWithoutPasswordConfirmation()
	{
		$this->fail('Not implemented yet!');
	}

	public function testInvalidEmail()
	{
		$this->fail('Not implemented yet!');
	}

	public function testInvalidPasswordConfirmation()
	{
		$this->fail('Not implemented yet!');
	}

	public function testPasswordTooShort()
	{
		$this->fail('Not implemented yet!');
	}
}

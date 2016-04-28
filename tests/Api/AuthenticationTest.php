<?php

use Festival\Entities\Users\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthenticationTest extends TestCase
{
	use DatabaseMigrations;

	public function testValidAuthentication()
	{
		$user = factory(User::class)->create([ 'password' => bcrypt(12345) ]);

		$credentials = [
			'email'    => $user->email,
			'password' => 12345,
		];

		$this->postJson('/api/login', $credentials)
			->seeStatusCode(200)
			->seeJson([ 'token' => $user->secret ]);
	}

	public function testEmptyEmail()
	{
		$this->fail('Not implemented yet');
	}

	public function testEmptyPassword()
	{
		$this->fail('Not implemented yet');
	}

	public function testEmptyPayload()
	{
		$this->fail('Not implemented yet');
	}

	public function testInvalidEmail()
	{
		$this->fail('Not implemented yet');
	}

	public function testInvalidPassword()
	{
		$this->fail('Not implemented yet');
	}
}

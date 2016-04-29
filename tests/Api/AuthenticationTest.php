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

	public function testTokenRegenerationOnLogin()
	{
		$user = factory(User::class)->create([ 'password' => bcrypt(12345) ]);

		$credentials = [
			'email'    => $user->email,
			'password' => 12345,
		];

		$this->postJson('/api/login', $credentials);

		$token = json_decode($this->response->content())->token;

		$this->postJson('/api/login', $credentials)
			->seeStatusCode(200)
			->dontSeeJson([ 'token' => $token ]);
	}

	public function testInvalidCredentials()
	{
		$this->postJson('/api/login', [ 'email' => 'invalid@invalid.invalid', 'password' => 'invalid' ])
			->seeStatusCode(401)
			->seeJson([ 'error' => 'Unauthorized access' ]);
	}

	public function testEmptyEmail()
	{
		factory(User::class)->create([ 'password' => bcrypt(12345) ]);

		$credentials = [
			'password' => 12345,
		];

		$this->postJson('/api/login', $credentials)
			->seeStatusCode(401)
			->seeJson([ 'error' => 'Unauthorized access' ]);
	}

	public function testEmptyPassword()
	{
		$user = factory(User::class)->create();

		$credentials = [
			'email' => $user->email,
		];

		$this->postJson('/api/login', $credentials)
			->seeStatusCode(401)
			->seeJson([ 'error' => 'Unauthorized access' ]);
	}

	public function testEmptyPayload()
	{
		$user = factory(User::class)->create();

		$this->postJson('/api/login')
			->seeStatusCode(401)
			->seeJson([ 'error' => 'Unauthorized access' ]);
	}

	public function testInvalidEmail()
	{
		$user = factory(User::class)->create([ 'password' => bcrypt(12345) ]);

		$credentials = [
			'email'    => $user->email . 'invalid',
			'password' => 12345,
		];

		$this->postJson('/api/login', $credentials)
			->seeStatusCode(401)
			->seeJson([ 'error' => 'Unauthorized access' ]);
	}

	public function testInvalidPassword()
	{
		$user = factory(User::class)->create();

		$credentials = [
			'email'    => $user->email,
			'password' => 12345,
		];

		$this->postJson('/api/login', $credentials)
			->seeStatusCode(401)
			->seeJson([ 'error' => 'Unauthorized access' ]);
	}
}

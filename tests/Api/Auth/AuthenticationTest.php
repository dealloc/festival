<?php

use Festival\Entities\Users\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthenticationTest extends TestCase
{
	use DatabaseMigrations;

	public function testValidAuthentication()
	{
		$user = factory(User::class)->create([ 'password' => bcrypt('foobar') ]);

		$credentials = [
			'email'    => $user->email,
			'password' => 'foobar',
		];

		$this->postJson('/api/login', $credentials)
			->seeStatusCode(200)
			->seeJson()
			->see('token');
	}

	public function testTokenRegenerationOnLogin()
	{
		$user = factory(User::class)->create([ 'password' => bcrypt('foobar') ]);
		$old = $user->secret;

		$credentials = [
			'email'    => $user->email,
			'password' => 'foobar',
		];

		// perform a login to refresh the token.
		$this->postJson('/api/login', $credentials)
			->seeStatusCode(200)
			->seeJson();

		$token = json_decode($this->response->content())->token;
		$this->assertNotEquals($old, $token, 'Token should be refreshed after login.');

		$this->seeInDatabase('users', [ 'secret' => $token ])
			->getJson('/api/user', [ 'Authorization' => $token ])
			->seeStatusCode(200)
			->seeJson();
	}

	public function testManualTokenRegeneration()
	{
		$user = factory(User::class)->create([ 'password' => bcrypt('foobar') ]);
		$old = $user->secret;

		$this->put('/api/token', [ ], [ 'Accept' => 'application/json', 'Authorization' => $user->secret ])
			->seeStatusCode(200)
			->seeJsonStructure([ 'token' ])
			->dontSeeInDatabase('users', [ 'secret' => $user->secret ])
			->assertNotEquals(json_decode($this->response->getContent())->token, $old);
	}

	public function testInvalidCredentials()
	{
		$this->postJson('/api/login', [ 'email' => 'invalid@invalid.invalid', 'password' => 'invalid' ])
			->seeStatusCode(401)
			->seeJson([ 'error' => 'Unauthorized access' ]);
	}

	public function testEmptyEmail()
	{
		factory(User::class)->create([ 'password' => bcrypt('foobar') ]);

		$credentials = [
			'password' => 'foobar',
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
		factory(User::class)->create();

		$this->postJson('/api/login')
			->seeStatusCode(401)
			->seeJson([ 'error' => 'Unauthorized access' ]);
	}

	public function testInvalidEmail()
	{
		$user = factory(User::class)->create([ 'password' => bcrypt('foobar') ]);

		$credentials = [
			'email'    => $user->email . 'invalid',
			'password' => 'foobar',
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
			'password' => 'foobar',
		];

		$this->postJson('/api/login', $credentials)
			->seeStatusCode(401)
			->seeJson([ 'error' => 'Unauthorized access' ]);
	}
}

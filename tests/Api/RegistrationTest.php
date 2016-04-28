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

		$this->post('/api/register', $user, [ 'Accept' => 'application/json' ])
			->seeStatusCode(200)
			->seeJson()
			->seeInDatabase('users', array_except($user, [ 'password', 'password_confirmation' ]));
	}
}

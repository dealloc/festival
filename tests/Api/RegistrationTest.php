<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationTest extends TestCase
{
	public function testValidRegistration()
	{
		$user = [

		];

		$this->post('/api/users/register', $user)
			->seeStatusCode(200)
			->seeJson([ 'status' => 'OK' ]);
	}
}

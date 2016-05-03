<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationTest extends TestCase
{
	use DatabaseMigrations;

	public static $VALID_USER = [
		'fname'                 => 'Wannes',
		'lname'                 => 'Gennar',
		'email'                 => 'foo@bar.com',
		'password'              => 'foobar',
		'password_confirmation' => 'foobar',
	];

	public function testValidRegistration()
	{
		$this->postJson('/api/register', RegistrationTest::$VALID_USER)
			->expectEmail(RegistrationTest::$VALID_USER['email'])
			->seeStatusCode(200)
			->seeJson()
			->seeInDatabase('users', array_except(RegistrationTest::$VALID_USER, [ 'password', 'password_confirmation' ]));
	}

	public function testWithoutFname()
	{
		$user = array_except(RegistrationTest::$VALID_USER, 'fname');

		$this->postJson('/api/register', $user)
			->seeStatusCode(422)
			->seeJson([ "fname" => [ "The fname field is required." ] ])
			->dontSeeInDatabase('users', $user);
	}

	public function testWithoutLname()
	{
		$user = array_except(RegistrationTest::$VALID_USER, 'lname');

		$this->postJson('/api/register', $user)
			->seeStatusCode(422)
			->seeJson([ "lname" => [ "The lname field is required." ] ])
			->dontSeeInDatabase('users', $user);
	}

	public function testWithoutEmail()
	{
		$user = array_except(RegistrationTest::$VALID_USER, 'email');

		$this->postJson('/api/register', $user)
			->seeStatusCode(422)
			->seeJson([ "email" => [ "The email field is required." ] ])
			->dontSeeInDatabase('users', $user);
	}

	public function testWithoutPassword()
	{
		$user = array_except(RegistrationTest::$VALID_USER, 'password');

		$this->postJson('/api/register', $user)
			->seeStatusCode(422)
			->seeJson([ "password" => [ "The password field is required." ] ])
			->dontSeeInDatabase('users', $user);
	}

	public function testWithoutPasswordConfirmation()
	{
		$user = array_except(RegistrationTest::$VALID_USER, 'password_confirmation');

		$this->postJson('/api/register', $user)
			->seeStatusCode(422)
			->seeJson([ "password" => [ "The password confirmation does not match." ] ])
			->dontSeeInDatabase('users', $user);
	}

	public function testInvalidEmail()
	{
		$user = RegistrationTest::$VALID_USER;
		$user[ 'email' ] = 'super duper invalid email addres!';

		$this->postJson('/api/register', $user)
			->seeStatusCode(422)
			->seeJson([ "email" => [ "The email must be a valid email address." ] ])
			->dontSeeInDatabase('users', $user);
	}

	public function testDuplicateEmail()
	{
		$user = factory(\Festival\Entities\Users\User::class)->create();

		$duplicate = RegistrationTest::$VALID_USER;
		$duplicate[ 'email' ] = $user->email;

		$this->postJson('/api/register', $duplicate)
			->seeStatusCode(422)
			->seeJson([ "email" => [ "The email has already been taken." ] ])
			->dontSeeInDatabase('users', $duplicate);
	}

	public function testInvalidPasswordConfirmation()
	{
		$user = RegistrationTest::$VALID_USER;
		$user['password_confirmation'] = 54321;

		$this->postJson('/api/register', $user)
			->seeStatusCode(422)
			->seeJson([ "password" => [ "The password confirmation does not match." ] ])
			->dontSeeInDatabase('users', $user);
	}

	public function testPasswordTooShort()
	{
		$user = RegistrationTest::$VALID_USER;
		$user['password'] = 1;
		$user['password_confirmation'] = 1;

		$this->postJson('/api/register', $user)
			->seeStatusCode(422)
			->seeJson([ "password" => [ "The password must be at least 5 characters." ] ])
			->dontSeeInDatabase('users', $user);
	}
}

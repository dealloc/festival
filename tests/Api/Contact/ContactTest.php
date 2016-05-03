<?php

use Festival\Entities\Users\User;
use Festival\Events\Contacts\CreateContactEvent;

class ContactTest extends TestCase
{
	public function testValidContact()
	{
		$user = factory(User::class)->make();

		$contact = [
			'sender' => $user->email,
			'subject' => 'My opinion',
			'content' => 'I love your website!'
		];

		$this->expectEmail()
			->postJson('/api/contact', $contact)
			->seeStatusCode(200)
			->seeJson($contact);
	}
}

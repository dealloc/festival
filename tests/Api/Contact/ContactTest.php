<?php

use Festival\Events\Contacts\CreateContactEvent;

class ContactTest extends TestCase
{
	public function testValidContact()
	{
		$contact = [
			'content' => 'I love your website!'
		];

		$this->expectsEvents(CreateContactEvent::class)
			->expectEmail()
			->postJson('/api/contact', $contact)
			->seeStatusCode(200)
			->seeJson($contact);
	}
}

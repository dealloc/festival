<?php

use Festival\Entities\Users\User;
use Festival\Events\Contacts\CreateContactEvent;

class ContactTest extends TestCase
{
	private function getvalidContact()
	{
		$user = factory(User::class)->make();

		return [
			'sender' => $user->email,
			'subject' => 'My opinion',
			'content' => 'I love your website!'
		];
	}

	public function testValidContact()
	{
		$contact = $this->getvalidContact();

		$this->expectEmail()
			->postJson('/api/contact', $contact)
			->seeStatusCode(200)
			->seeJson($contact);
	}

	public function testNoSender()
	{
		$this->fail('Not implemented.');
	}

	public function testEmptySender()
	{
		$this->fail('Not implemented.');
	}

	public function testInvalidSender()
	{
		$this->fail('Not implemented.');
	}

	public function testNoSubject()
	{
		$this->fail('Not implemented.');
	}

	public function testEmptySubject()
	{
		$this->fail('Not implemented.');
	}

	public function testNoContent()
	{
		$this->fail('Not implemented.');
	}

	public function testEmptyContent()
	{
		$this->fail('Not implemented.');
	}
}

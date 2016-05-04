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
		$contact = array_except($this->getvalidContact(), 'sender');

		$this->dontExpectEmail()
			->postJson('/api/contact', $contact)
			->seeStatusCode(422)
			->seeJson();
	}

	public function testEmptySender()
	{
		$contact = $this->getvalidContact();
		$contact['sender'] = '';

		$this->dontExpectEmail()
			->postJson('/api/contact', $contact)
			->seeStatusCode(422)
			->seeJson();
	}

	public function testInvalidSender()
	{
		$contact = $this->getvalidContact();
		$contact['sender'] = 'invalid';

		$this->postJson('/api/contact', $contact)
			->seeStatusCode(422)
			->seeJson();
	}

	public function testNoSubject()
	{
		$contact = array_except($this->getvalidContact(), 'subject');

		$this->dontExpectEmail()
			->postJson('/api/contact', $contact)
			->seeStatusCode(422)
			->seeJson();
	}

	public function testEmptySubject()
	{
		$contact = $this->getvalidContact();
		$contact['subject'] = '';

		$this->dontExpectEmail()
			->postJson('/api/contact', $contact)
			->seeStatusCode(422)
			->seeJson();
	}

	public function testNoContent()
	{
		$contact = array_except($this->getvalidContact(), 'content');

		$this->dontExpectEmail()
			->postJson('/api/contact', $contact)
			->seeStatusCode(422)
			->seeJson();
	}

	public function testEmptyContent()
	{
		$contact = $this->getvalidContact();
		$contact['content'] = '';

		$this->dontExpectEmail()
			->postJson('/api/contact', $contact)
			->seeStatusCode(422)
			->seeJson();
	}
}

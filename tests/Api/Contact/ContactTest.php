<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContactTest extends TestCase
{
	public function testValidContact()
	{
		$contact = [
			'content' => 'I love your website!'
		];

		$this->postJson('/api/contact', $contact)
			->seeStatusCode(200)
			->seeJson();
	}
}

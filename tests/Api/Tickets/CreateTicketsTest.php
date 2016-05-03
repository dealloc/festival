<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateTicketsTest extends AuthenticatedTestCase
{
	public function testValidPurchase()
	{
		$this->postJson('/api/tickets/purchase')
			->seeStatusCode(200)
			->seeJsonStructure([ 'id', 'token' ]);

		$ticket = json_decode($this->response->getContent(), true);
		$this->seeInDatabase('tickets', $ticket);
	}
}

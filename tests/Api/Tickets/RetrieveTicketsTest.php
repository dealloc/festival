<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RetrieveTicketsTest extends AuthenticatedTestCase
{
	public function testValidListing()
	{
		factory(\Festival\Entities\Tickets\Ticket::class, 10)->create();

		$this->getJson('/api/tickets')
			->seeStatusCode(200)
			->seeJsonStructure([
				'*' => [
					'id', 'token', 'created_at'
				]
			]);
	}

	public function testUnauthorizedListing()
	{
		$this->logout();
		factory(\Festival\Entities\Tickets\Ticket::class, 10)->create();

		$this->getJson('/api/tickets')
			->seeStatusCode(401);
	}
}

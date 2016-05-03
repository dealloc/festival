<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RetrieveTicketsTest extends AuthenticatedTestCase
{
	public function testValidListing()
	{
		factory(\Festival\Entities\Tickets\Ticket::class, 10);

		$this->getJson('/api/tickets')
			->seeStatusCode(200)
			->seeJsonStructure([
				'*' => [
					'id', 'token', 'created_at'
				]
			]);
	}
}

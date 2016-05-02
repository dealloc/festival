<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GetNewsTest extends AuthenticatedTestCase
{
	public function testRetrieveAll()
	{
		$this->getJson('/api/news')
			->seeStatusCode(200)
			->seeJsonStructure(['total', 'per_page', 'last_page', 'from', 'to', 'data']);
	}
}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GetNewsTest extends AuthenticatedTestCase
{
	private function generateNews($amount = 1)
	{
		factory(\Festival\Entities\News\News::class, $amount)->create();
	}

	public function testRetrieveAll()
	{
		$this->generateNews(5);

		$this->getJson('/api/news')
			->seeStatusCode(200)
			->seeJsonStructure(['total', 'per_page', 'last_page', 'from', 'to', 'data']);
	}
}

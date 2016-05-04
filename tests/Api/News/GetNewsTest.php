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
			->seeJsonStructure([ 'total', 'current_page', 'per_page', 'last_page', 'from', 'to', 'data' ])
			->seeJson([ 'current_page' => 1 ])
			->seeJson([ 'total' => 5 ]);
	}

	public function testRetrieveNothing()
	{
		$this->getJson('/api/news')
			->seeStatusCode(200)
			->seeJsonStructure([ 'total', 'current_page', 'per_page', 'last_page', 'from', 'to', 'data' ])
			->seeJson([ 'current_page' => 1 ])
			->seeJson([ 'total' => 0 ]);
	}

	public function retrieveSecondPage()
	{
		$this->generateNews(50);

		$this->getJson('/api/news?page=2')
			->seeStatusCode(200)
			->seeJsonStructure([ 'total', 'current_page', 'per_page', 'last_page', 'from', 'to', 'data' ])
			->seeJson([ 'current_page' => 2 ])
			->seeJson([ 'total' => 50 ]);
	}
}

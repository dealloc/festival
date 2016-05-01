<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateNewsTest extends AuthenticatedTestCase
{
	public function testValidCreation()
	{
		$this->authenticate();

		$news = [
			'title' => 'foo article',
			'content' => 'lorem ipsum dolor amat!'
		];

		$this->postJson('/api/news/create', $news)
			->seeStatusCode(200)
			->seeJson($news)// TODO see what JSON?
			->seeInDatabase('newsitems', $news);
	}
}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateNewsTest extends AuthenticatedTestCase
{
	CONST TABLE_NAME = 'newsitems';

	const VALID_NEWS = [
		'title' => 'foo article',
		'content' => 'lorem ipsum dolor amat!'
	];

	public function testValidCreation()
	{
		$this->postJson('/api/news/create', CreateNewsTest::VALID_NEWS)
			->seeStatusCode(200)
			->seeJson(CreateNewsTest::VALID_NEWS)
			->seeInDatabase(CreateNewsTest::TABLE_NAME, CreateNewsTest::VALID_NEWS);
	}

	public function testNoTitle()
	{
		$news = array_except(CreateNewsTest::VALID_NEWS, 'title');

		$this->postJson('/api/news/create', $news)
			->seeStatusCode(422)
			->seeJson([])
			->dontSeeInDatabase(CreateNewsTest::TABLE_NAME, $news);
	}

	public function testEmptyTitle()
	{
		$news = CreateNewsTest::VALID_NEWS;

		$news['title'] = '';

		$this->postJson('/api/news/create', $news)
			->seeStatusCode(422)
			->seeJson([])
			->dontSeeInDatabase(CreateNewsTest::TABLE_NAME, $news);
	}

	public function testNoContent()
	{
		$news = array_except(CreateNewsTest::VALID_NEWS, 'content');

		$this->postJson('/api/news/create', $news)
			->seeStatusCode(422)
			->seeJson([])
			->dontSeeInDatabase(CreateNewsTest::TABLE_NAME, $news);
	}

	public function testEmptyContent()
	{
		$news = CreateNewsTest::VALID_NEWS;

		$news['content'] = '';

		$this->postJson('/api/news/create', $news)
			->seeStatusCode(422)
			->seeJson([])
			->dontSeeInDatabase(CreateNewsTest::TABLE_NAME, $news);
	}

	public function testEmptyPayload()
	{
		$this->postJson('/api/news/create')
			->seeStatusCode(422)
			->seeJson([])
			->dontSeeInDatabase(CreateNewsTest::TABLE_NAME, []);
	}

	public function testNotAuthenticated()
	{
		$this->logout();

		$this->postJson('/api/news/create', CreateNewsTest::VALID_NEWS)
			->seeStatusCode(401)
			->dontSeeJson(CreateNewsTest::VALID_NEWS)
			->dontSeeInDatabase(CreateNewsTest::TABLE_NAME, CreateNewsTest::VALID_NEWS);
	}
}

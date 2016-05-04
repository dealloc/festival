<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateCommentTest extends AuthenticatedTestCase
{
	public static $TABLE_NAME = 'comments';

	public function testValidCreation()
	{
		$news = factory(\Festival\Entities\News\News::class)->create();

		$comment = [
			'news_id' => $news->id,
			'content' => 'Lorem ipsum dolor amat!'
		];

		$this->postJson('/api/news/' . $news->identifier . '/comment', $comment)
			->seeStatusCode(200)
			->seeJson()
			->seeInDatabase(CreateCommentTest::$TABLE_NAME, $comment);
	}

	public function testNoNews()
	{
		$this->fail('Not implemented yet.');
	}

	public function testEmptyNews()
	{
		$this->fail('Not implemented yet.');
	}

	public function testInvalidNews()
	{
		$this->fail('Not implemented yet.');
	}

	public function testNoContent()
	{
		$this->fail('Not implemented yet.');
	}

	public function testEmptyContent()
	{
		$this->fail('Not implemented yet.');
	}
}

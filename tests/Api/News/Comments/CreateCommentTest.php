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
			'content' => 'Lorem ipsum dolor amat!',
		];

		$this->postJson('/api/news/' . $news->identifier . '/comment', $comment)
			->seeStatusCode(200)
			->seeJson($comment)
			->seeInDatabase(CreateCommentTest::$TABLE_NAME, $comment);
	}

	public function testInvalidNews()
	{
		$this->postJson('/api/news/invalid/comment')
			->seeStatusCode(404)
			->seeJson()
			->dontSeeInDatabase(CreateCommentTest::$TABLE_NAME, [ ]);
	}

	public function testNoContent()
	{
		$news = factory(\Festival\Entities\News\News::class)->create();

		$this->postJson('/api/news/' . $news->identifier . '/comment')
			->seeStatusCode(422)
			->seeJson([ 'content' => [ 'The content field is required.' ] ])
			->dontSeeInDatabase(CreateCommentTest::$TABLE_NAME, [ ]);
	}

	public function testEmptyContent()
	{
		$news = factory(\Festival\Entities\News\News::class)->create();

		$comment = [ 'content' => '' ];

		$this->postJson('/api/news/' . $news->identifier . '/comment', $comment)
			->seeStatusCode(422)
			->seeJson([ 'content' => [ 'The content field is required.' ] ])
			->dontSeeInDatabase(CreateCommentTest::$TABLE_NAME, [ ]);
	}
}

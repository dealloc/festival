<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateArtistTest extends AuthenticatedTestCase
{
	public static $TABLE_NAME = 'artists';

	public function testValidCreation()
	{
		$artist = [
		];

		$this->postJson('/api/lineup/create', $artist)
			->seeStatusCode(200)
			->seeJson()
			->seeInDatabase(CreateArtistTest::$TABLE_NAME, $artist);
	}
}

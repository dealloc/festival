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
			'name' => 'John lemon',
			'description' => 'some juicy beats',
			'start' => \Carbon\Carbon::now()->toDateTimeString(),
			'end' => \Carbon\Carbon::now()->addHour(5)->toDateTimeString(),
			'image' => 'http://lorempixel.com/g/400/200/'
		];

		$this->postJson('/api/lineup/create', $artist)
			->seeStatusCode(200)
			->seeJson()
			->seeInDatabase(CreateArtistTest::$TABLE_NAME, $artist);
	}
}

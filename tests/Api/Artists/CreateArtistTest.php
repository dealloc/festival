<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateArtistTest extends AuthenticatedTestCase
{
	public static $TABLE_NAME = 'artists';

	private function getValidArtist()
	{
		return [
			'name'        => 'John lemon',
			'description' => 'some juicy beats',
			'start'       => \Carbon\Carbon::now()->toDateTimeString(),
			'end'         => \Carbon\Carbon::now()->addHour(5)->toDateTimeString(),
			'image'       => 'http://lorempixel.com/g/400/200/',
		];
	}

	public function testValidCreation()
	{
		$artist = $this->getValidArtist();

		$this->postJson('/api/lineup/create', $artist)
			->seeStatusCode(200)
			->seeJson()
			->seeInDatabase(CreateArtistTest::$TABLE_NAME, $artist);
	}

	public function testEmptyPayload()
	{
		$this->postJson('/api/lineup/create')
			->seeStatusCode(422)
			->seeJson([ 'name' => [ 'The name field is required.' ] ])
			->seeJson([ 'description' => [ 'The description field is required.' ] ])
			->seeJson([ 'start' => [ 'The start field is required.' ] ])
			->seeJson([ 'end' => [ 'The end field is required.' ] ])
			->seeJson([ 'image' => [ 'The image field is required.' ] ])
			->dontSeeInDatabase(CreateArtistTest::$TABLE_NAME, [ ]);
	}

	public function testNoName()
	{
		$artist = array_except($this->getValidArtist(), 'name');

		$this->postJson('/api/lineup/create', $artist)
			->seeStatusCode(422)
			->seeJson([ 'name' => [ 'The name field is required.' ] ])
			->dontSeeInDatabase(CreateArtistTest::$TABLE_NAME, $artist);
	}

	public function testEmptyName()
	{
		$artist = $this->getValidArtist();
		$artist[ 'name' ] = '';

		$this->postJson('/api/lineup/create', $artist)
			->seeStatusCode(422)
			->seeJson([ 'name' => [ 'The name field is required.' ] ])
			->dontSeeInDatabase(CreateArtistTest::$TABLE_NAME, $artist);
	}

	public function testNoDescription()
	{
		$artist = array_except($this->getValidArtist(), 'description');

		$this->postJson('/api/lineup/create', $artist)
			->seeStatusCode(422)
			->seeJson([ 'description' => [ 'The description field is required.' ] ])
			->dontSeeInDatabase(CreateArtistTest::$TABLE_NAME, $artist);
	}

	public function testEmptyDescription()
	{
		$artist = $this->getValidArtist();
		$artist[ 'description' ] = '';

		$this->postJson('/api/lineup/create', $artist)
			->seeStatusCode(422)
			->seeJson([ 'description' => [ 'The description field is required.' ] ])
			->dontSeeInDatabase(CreateArtistTest::$TABLE_NAME, $artist);
	}

	public function testNoStartDate()
	{
		$artist = array_except($this->getValidArtist(), 'start');

		$this->postJson('/api/lineup/create', $artist)
			->seeStatusCode(422)
			->seeJson([ 'start' => [ 'The start field is required.' ] ])
			->dontSeeInDatabase(CreateArtistTest::$TABLE_NAME, $artist);
	}

	public function testEmptyStartDate()
	{
		$artist = $this->getValidArtist();
		$artist[ 'start' ] = '';

		$this->postJson('/api/lineup/create', $artist)
			->seeStatusCode(422)
			->seeJson([ 'start' => [ 'The start field is required.' ] ])
			->dontSeeInDatabase(CreateArtistTest::$TABLE_NAME, $artist);
	}

	public function testInvalidStartDate()
	{
		$artist = $this->getValidArtist();
		$artist[ 'start' ] = 'invalid';

		$this->postJson('/api/lineup/create', $artist)
			->seeStatusCode(422)
			->seeJson([ 'start' => [ 'The start is not a valid date.' ] ])
			->dontSeeInDatabase(CreateArtistTest::$TABLE_NAME, $artist);
	}

	public function testNoEndDate()
	{
		$artist = array_except($this->getValidArtist(), 'end');

		$this->postJson('/api/lineup/create', $artist)
			->seeStatusCode(422)
			->seeJson([ 'end' => [ 'The end field is required.' ] ])
			->dontSeeInDatabase(CreateArtistTest::$TABLE_NAME, $artist);
	}

	public function testEmptyEndDate()
	{
		$artist = $this->getValidArtist();
		$artist[ 'end' ] = '';

		$this->postJson('/api/lineup/create', $artist)
			->seeStatusCode(422)
			->seeJson([ 'end' => [ 'The end field is required.' ] ])
			->dontSeeInDatabase(CreateArtistTest::$TABLE_NAME, $artist);
	}

	public function testInvalidEndDate()
	{
		$artist = $this->getValidArtist();
		$artist[ 'end' ] = 'invalid';

		$this->postJson('/api/lineup/create', $artist)
			->seeStatusCode(422)
			->seeJson([ 'end' => [ 'The end is not a valid date.' ] ])
			->dontSeeInDatabase(CreateArtistTest::$TABLE_NAME, $artist);
	}

	public function testStartDateBeforeEndDate()
	{
		$artist = $this->getValidArtist();
		$artist[ 'start' ] = \Carbon\Carbon::now()->subDay()->toDateTimeString();
		$artist[ 'end' ] = \Carbon\Carbon::now()->toDateTimeString();

		$this->postJson('/api/lineup/create', $artist)
			->seeStatusCode(422)
			->seeJson()
			->dontSeeInDatabase(CreateArtistTest::$TABLE_NAME, $artist);
	}

	public function testNoImage()
	{
		$artist = array_except($this->getValidArtist(), 'image');

		$this->postJson('/api/lineup/create', $artist)
			->seeStatusCode(422)
			->seeJson([ 'image' => [ 'The image field is required.' ] ])
			->dontSeeInDatabase(CreateArtistTest::$TABLE_NAME, $artist);
	}

	public function testEmptyImage()
	{
		$artist = $this->getValidArtist();
		$artist[ 'image' ] = '';

		$this->postJson('/api/lineup/create', $artist)
			->seeStatusCode(422)
			->seeJson([ 'image' => [ 'The image field is required.' ] ])
			->dontSeeInDatabase(CreateArtistTest::$TABLE_NAME, $artist);
	}
}

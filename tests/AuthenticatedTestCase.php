<?php

use Festival\Entities\Users\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthenticatedTestCase extends Illuminate\Foundation\Testing\TestCase
{
	use DatabaseMigrations;

	const AJAX_HEADER = [ 'Accept' => 'application/json' ];

	/**
	 * @var \Festival\Entities\Users\User
	 */
	protected $user = null;

	/**
	 * The base URL to use while testing the application.
	 *
	 * @var string
	 */
	protected $baseUrl = 'http://localhost';

	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication()
	{
		$app = require __DIR__ . '/../bootstrap/app.php';

		$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

		return $app;
	}

	/**
	 * Authenticate a user for the unit test.
	 */
	public function authenticate()
	{
		if ( ! is_null($this->user) )
			return;

		$this->user = factory(User::class)->create([ 'password' => bcrypt(12345) ]);
	}

	public function logout()
	{
		$this->user = null;
	}

	/**
	 * Visit the given URI with a JSON GET request.
	 *
	 * @param  string $uri
	 * @param  array $headers
	 * @return $this
	 */
	public function getJson($uri, array $headers = [ ])
	{
		if ( ! is_null($this->user) )
			$headers[ 'Authorization' ] = $this->user->secret;

		return parent::get($uri, $headers);
	}

	/**
	 * Visit the given URI with a POST request.
	 *
	 * @param  string $uri
	 * @param  array $data
	 * @param  array $headers
	 * @return $this
	 */
	public function postJson($uri, array $data = [ ], array $headers = [ ])
	{
		if ( ! is_null($this->user) )
			$headers[ 'Authorization' ] = $this->user->secret;

		return parent::post($uri, $data, $headers);
	}
}

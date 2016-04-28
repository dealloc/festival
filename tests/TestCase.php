<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
	const AJAX_HEADER = [ 'Accept' => 'application/json' ];

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
	 * Visit the given URI with a JSON GET request.
	 *
	 * @param  string  $uri
	 * @param  array  $headers
	 * @return $this
	 */
	public function getJson($uri, array $headers = [])
	{
		$headers['Accept'] = 'application/json';

		return $this->get($uri, $headers);
	}

	/**
	 * Visit the given URI with a POST request.
	 *
	 * @param  string  $uri
	 * @param  array  $data
	 * @param  array  $headers
	 * @return $this
	 */
	public function postJson($uri, array $data = [ ], array $headers = [ ])
	{
		$headers['Accept'] = 'application/json';

		return $this->post($uri, $data, $headers);
	}
}

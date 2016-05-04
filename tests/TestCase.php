<?php

use Illuminate\Contracts\Mail\Mailer as MailerContract;

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
	public static $AJAX_HEADER = [ 'Accept' => 'application/json' ];

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
	 * @param  string $uri
	 * @param  array $headers
	 * @return $this
	 */
	public function getJson($uri, array $headers = [ ])
	{
		$headers[ 'Accept' ] = 'application/json';

		return $this->get($uri, $headers);
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
		$headers[ 'Accept' ] = 'application/json';

		return $this->post($uri, $data, $headers);
	}

	/**
	 * Assert that an email was send.
	 *
	 * @param string|null $recipient
	 * @param string|null $subject
	 * @param string|null $content
	 * @param int $times
	 * @return $this
	 */
	protected function expectEmail($recipient = null, $subject = null, $content = null, $times = 1)
	{
		$mock = \Mockery::mock(app(MailerContract::class));
		$this->app->singleton(MailerContract::class, function() use($mock) { return $mock; });

		$mock->shouldReceive('send')
			->with(\Mockery::any(), \Mockery::any(), \Mockery::on(function (\Closure $closure) use ($recipient, $subject, $content)
			{
				// TODO validate subject, recipients etc.

				return true;
			}))
			->times($times);

		return $this;
	}

	protected function dontExpectEmail()
	{
		return $this->expectEmail(null, null, null, 0);
	}
}

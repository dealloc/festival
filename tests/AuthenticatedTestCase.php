<?php

use Festival\Entities\Users\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthenticatedTestCase extends TestCase
{
	use DatabaseMigrations;

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

	public function setUp()
	{
		$this->afterApplicationCreated(function() { $this->authenticate(); });

		parent::setUp();
	}

	/**
	 * Authenticate a user for the unit test.
	 */
	public function authenticate()
	{
		if ( ! is_null($this->user) )
			return $this;

		$this->user = factory(User::class)->create([ 'password' => bcrypt('foobar') ]);
		$this->actingAs($this->user);

		return $this;
	}

	public function logout()
	{
		$this->user = null;
		$this->app['auth']->guard()->logout();

		return $this;
	}

	public function asAdmin()
	{
		if (is_null($this->user))
			$this->authenticate();

		$this->user->admin = true;
		$this->user->save();

		return $this;
	}
}

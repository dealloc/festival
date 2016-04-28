<?php

namespace Festival\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
	/**
	 * This namespace is applied to your controller routes.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'Festival\Http\Controllers';
	
	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);
	}
	
	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$this->mapWebRoutes($router);

		$this->mapApiRoutes($router);
	}
	
	/**
	 * Define the "web" routes for the application.
	 *
	 * These routes all receive session state, CSRF protection, etc.
	 *
	 * @param  \Illuminate\Routing\Router $router
	 * @return void
	 */
	protected function mapWebRoutes(Router $router)
	{
		$router->group([ 'namespace' => $this->namespace . '\Web' ], function (Router $router)
		{
			require base_path('src/Http/Routes/Web/routes.php');
		});
	}

	/**
	 * Define the "api" routes for the application.
	 *
	 * These routes all receive no session state, CSRF protection, etc.
	 *
	 * @param  \Illuminate\Routing\Router $router
	 * @return void
	 */
	private function mapApiRoutes($router)
	{
		$router->group([ 'namespace' => $this->namespace . '\Api', 'middleware' => 'api', 'prefix' => 'api' ], function (Router $router)
		{
			require base_path('src/Http/Routes/Api/guest.php');

			$router->group([ 'middleware' => 'auth' ], function (Router $router)
			{
				require base_path('src/Http/Routes/Api/routes.php');
			});
		});
	}
}

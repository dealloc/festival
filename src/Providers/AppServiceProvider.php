<?php

namespace Festival\Providers;

use Illuminate\Support\ServiceProvider;
use Festival\Repositories\Users\EloquentUserRepository;
use Festival\Contracts\Repositories\Users\UserRepository;
use Festival\Repositories\Tickets\EloquentTicketRepository;
use Festival\Repositories\Artists\EloquentArtistRepository;
use Festival\Contracts\Repositories\Tickets\TicketRepository;
use Festival\Contracts\Repositories\Artists\ArtistRepository;
use Festival\Repositories\NewsItems\EloquentNewsItemRepository;
use Festival\Contracts\Repositories\NewsItems\NewsItemRepository;

class AppServiceProvider extends ServiceProvider
{
    protected $bindings = [
		UserRepository::class => EloquentUserRepository::class,
		ArtistRepository::class => EloquentArtistRepository::class,
		TicketRepository::class => EloquentTicketRepository::class,
		NewsItemRepository::class => EloquentNewsItemRepository::class,
	];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
		foreach ($this->bindings as $contract => $binding)
			$this->app->bind($contract, $binding);
    }
}

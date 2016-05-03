<?php

namespace Festival\Providers;

use Festival\Contracts\Repositories\News\Comments\CommentRepository;
use Festival\Repositories\NewsItems\Comments\EloquentCommentRepository;
use Illuminate\Support\ServiceProvider;
use Festival\Auth\EloquentAuthenticateService;
use Festival\Contracts\Auth\AuthenticateService;
use Festival\Repositories\Users\EloquentUserRepository;
use Festival\Contracts\Repositories\Users\UserRepository;
use Festival\Repositories\Tickets\EloquentTicketRepository;
use Festival\Repositories\Artists\EloquentArtistRepository;
use Festival\Contracts\Repositories\Tickets\TicketRepository;
use Festival\Contracts\Repositories\Artists\ArtistRepository;
use Festival\Repositories\News\EloquentNewsRepository;
use Festival\Contracts\Repositories\News\NewsRepository;

class BindingServiceProvider extends ServiceProvider
{
	protected $bindings = [
		UserRepository::class      => EloquentUserRepository::class,
		ArtistRepository::class    => EloquentArtistRepository::class,
		TicketRepository::class    => EloquentTicketRepository::class,
		CommentRepository::class   => EloquentCommentRepository::class,
		NewsRepository::class      => EloquentNewsRepository::class,
		AuthenticateService::class => EloquentAuthenticateService::class,
	];

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		foreach ( $this->bindings as $contract => $binding )
			$this->app->singleton($contract, $binding);
	}
}

<?php

namespace Festival\Providers;

use Festival\Events\Contacts\CreateContactEvent;
use Festival\Events\Listeners\Contacts\SendMailOnCreateListener;
use Festival\Events\Listeners\Users\MailUserOnCreateListener;
use Festival\Events\Users\CreateUserEvent;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Map events to their listeners.
 *
 * Class EventServiceProvider
 * @package Festival\Providers
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        CreateContactEvent::class => [
            SendMailOnCreateListener::class,
        ],
        CreateUserEvent::class => [
            MailUserOnCreateListener::class
        ]
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}

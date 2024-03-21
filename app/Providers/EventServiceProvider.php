<?php

namespace App\Providers;

use App\Events\EventCreated;
use App\Events\EventCreatedNotification;
use App\Mail\SendEventCreatedNotification;
use App\Mail\SendEventNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        EventCreated::class => [
            SendEventCreatedNotification::class,
        ],
        EventCreatedNotification::class => [
            SendEventNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

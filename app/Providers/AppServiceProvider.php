<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\Service;
use App\Observers\SlugObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Event::observe(SlugObserver::class);
        Service::observe(SlugObserver::class);
    }
}

<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\Service;
use App\Models\ServiceReview;
use App\Observers\MarkObserver;
use App\Observers\SlugObserver;
use Illuminate\Pagination\Paginator;
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
        ServiceReview::observe(MarkObserver::class);

        Paginator::useBootstrap();
    }
}

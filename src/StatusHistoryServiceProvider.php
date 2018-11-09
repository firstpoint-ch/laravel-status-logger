<?php

namespace StatusHistory;

use Illuminate\Support\ServiceProvider;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Event;

class StatusHistoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        Event::listen(
            \StatusHistory\Events\StatusableModelSaved::class,
            \StatusHistory\Listeners\PushStatusToHistory::class
        );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

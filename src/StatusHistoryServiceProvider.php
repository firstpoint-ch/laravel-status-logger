<?php

namespace StatusLogger;

use Illuminate\Support\ServiceProvider;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Event;

class StatusLoggerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->mergeConfigFrom(__DIR__.'/config/status.php', 'status');

        Event::listen(
            \StatusLogger\Events\StatusableModelSaved::class,
            \StatusLogger\Listeners\PushStatusToHistory::class
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

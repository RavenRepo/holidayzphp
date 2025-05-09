<?php

namespace Holidayz\Packages\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Permission\PermissionServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Register the Spatie Permission package
        $this->app->register(PermissionServiceProvider::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Publish migrations
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../Database/Migrations' => database_path('migrations'),
            ], 'holidayz-core-migrations');
        }

        // Load migrations
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
    }
}

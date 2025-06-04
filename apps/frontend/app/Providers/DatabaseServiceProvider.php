<?php

namespace App\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class DatabaseServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Add a custom UUID macro to Blueprint
        Blueprint::macro('uuid', function ($column = 'id') {
            // For MySQL, we need to use CHAR(36) for UUID
            return $this->char($column, 36);
        });
    }
}

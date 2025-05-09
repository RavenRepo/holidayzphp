<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Filament;

class FilamentServiceProvider extends ServiceProvider
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
        Filament::serving(function () {
            Filament::registerRenderHook(
                'content.start',
                fn (): string => auth()->check() && (auth()->user()->hasRole(['admin', 'manager']))
                    ? ''
                    : redirect()->route('login')->with('error', 'You need admin permissions to access this area.')->getContent()
            );
        });
    }
}

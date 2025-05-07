<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        if (class_exists('Filament\\Facades\\Filament')) {
            \Filament\Facades\Filament::serving(function () {
                \Filament\Facades\Filament::registerRenderHook(
                    'content.start',
                    fn (): string => auth()->check() && (auth()->user()->hasRole(['admin', 'manager']))
                        ? ''
                        : redirect()->route('login')->with('error', 'You need admin permissions to access this area.')->getContent()
                );
            });

            \Filament\Facades\Filament::navigation(function ($builder) {
                $builder->items([
                    // Your items
                ]);

                $builder->groups([
                    \Filament\Navigation\NavigationGroup::make()
                        ->label('Access Management')
                        ->icon('heroicon-o-shield-check'),
                    \Filament\Navigation\NavigationGroup::make()
                        ->label('Content')
                        ->icon('heroicon-o-document-text'),
                ]);
            });
        }
    }
} 
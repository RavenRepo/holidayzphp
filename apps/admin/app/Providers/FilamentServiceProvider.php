<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
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
        // Add auth check for roles
        Filament::serving(function () {
            // Require admin or manager role to access Filament
            Filament::registerRenderHook(
                'content.start',
                fn (): string => auth()->check() && (auth()->user()->hasRole(['admin', 'manager'])) 
                    ? '' 
                    : redirect()->route('login')->with('error', 'You need admin permissions to access this area.')->getContent()
            );
        });
        
        // Configure the navigation groups
        Filament::navigation(function (\Filament\Navigation\NavigationBuilder $builder) {
            $builder->items([
                // Your items
            ]);

            $builder->groups([
                NavigationGroup::make()
                    ->label('Access Management')
                    ->icon('heroicon-o-shield-check'),
                NavigationGroup::make()
                    ->label('Content')
                    ->icon('heroicon-o-document-text'),
            ]);
        });
    }
} 
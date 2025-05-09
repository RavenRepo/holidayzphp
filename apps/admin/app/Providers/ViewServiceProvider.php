<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::component('app-layout', \App\View\Components\AppLayout::class);
        Blade::component('guest-layout', \App\View\Components\GuestLayout::class);
        Blade::component('application-logo', \App\View\Components\ApplicationLogo::class);
        Blade::component('auth-session-status', \App\View\Components\AuthSessionStatus::class);
        Blade::component('input-error', \App\View\Components\InputError::class);
        Blade::component('input-label', \App\View\Components\InputLabel::class);
        Blade::component('nav-link', \App\View\Components\NavLink::class);
        Blade::component('primary-button', \App\View\Components\PrimaryButton::class);
        Blade::component('text-input', \App\View\Components\TextInput::class);
    }
}

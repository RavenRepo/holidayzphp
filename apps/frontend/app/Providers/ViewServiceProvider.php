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
        // Register Home Components
        Blade::componentNamespace('App\\View\\Components\\Home', 'home');
        
        // Explicitly register home blade components
        $this->loadViewComponentsAs('home', [
            'hero-carousel' => 'components.home.hero-carousel',
            'popular-packages' => 'components.home.popular-packages',
            'testimonials' => 'components.home.testimonials',
            'blog-inspirations' => 'components.home.blog-inspirations',
            'cta-section' => 'components.home.cta-section',
            'lead-form' => 'components.home.lead-form',
            'benefits-section' => 'components.home.benefits-section',
            'visa-free-destinations' => 'components.home.visa-free-destinations',
        ]);
    }
}

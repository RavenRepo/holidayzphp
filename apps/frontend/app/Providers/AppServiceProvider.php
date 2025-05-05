<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        // Register UI Components
        $this->loadViewComponentsAs('ui', [
            // Layout Components
            'layout.app' => 'components.ui.layout.app',
            'layout.header' => 'components.ui.layout.header',
            'layout.footer' => 'components.ui.layout.footer',
            'layout.page-heading' => 'components.ui.layout.page-heading',
            'layout.section' => 'components.ui.layout.section',
            
            // Feature Components
            'why-choose-us.why-choose-us' => 'components.ui.why-choose-us.why-choose-us',
            
            // Form Components
            'forms.button' => 'components.ui.forms.button',
            'forms.input' => 'components.ui.forms.input',
        ]);
        //
    }
}

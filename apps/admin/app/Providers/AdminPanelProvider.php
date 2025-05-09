<?php

namespace App\Providers;

use Filament\Panel;
use Filament\PanelProvider;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin')
            ->path('admin')
            // ->navigation([...])
            // ->widgets([...])
            // ->renderHook('content.start', ...)
            ;
    }
} 
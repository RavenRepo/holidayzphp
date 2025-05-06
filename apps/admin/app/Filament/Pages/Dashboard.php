<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Contracts\Support\Htmlable;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    
    protected static string $view = 'filament.pages.dashboard';
    
    public function getTitle(): string | Htmlable
    {
        return __('Admin Dashboard');
    }
    
    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Widgets\StatsOverviewWidget::class,
        ];
    }
    
    protected function getFooterWidgets(): array
    {
        return [
            \App\Filament\Widgets\LatestUsers::class,
        ];
    }
} 
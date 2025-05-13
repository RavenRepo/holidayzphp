<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    
    protected static ?string $title = 'Admin Dashboard';
    
    protected static ?int $navigationSort = -1;
    
    public function getHeaderWidgetsColumns(): int|array
    {
        return 3;
    }
}

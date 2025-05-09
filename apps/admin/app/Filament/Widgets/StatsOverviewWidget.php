<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getCards(): array
    {
        return [
            Card::make('Total Users', User::count())
                ->description('Total registered users')
                ->descriptionIcon('heroicon-s-users')
                ->color('success'),

            Card::make('Roles', Role::count())
                ->description('System roles for access control')
                ->descriptionIcon('heroicon-s-shield-check')
                ->color('primary'),

            Card::make('Permissions', Permission::count())
                ->description('Granular access permissions')
                ->descriptionIcon('heroicon-s-key')
                ->color('warning'),
        ];
    }
}

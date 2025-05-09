<?php

namespace App\Filament\Pages;

use Filament\Pages\Page as BasePage;
use Illuminate\Contracts\Support\Htmlable;

class Dashboard extends BasePage
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.pages.dashboard';

    public function getTitle(): string|Htmlable
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
        // TODO: Implement LatestUsers widget or update this reference if needed in the future.
        return [
            // \App\Filament\Widgets\LatestUsers::class,
        ];
    }

    public static function makeFilamentTranslatableContentDriver(): ?string
    {
        return null;
    }
}

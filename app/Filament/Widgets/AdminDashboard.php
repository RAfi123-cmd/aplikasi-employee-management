<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminDashboard extends BaseWidget
{

    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah total pegawai', Employee::count()),
        ];
    }
}

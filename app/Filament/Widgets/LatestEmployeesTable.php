<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class LatestEmployeesTable extends TableWidget 
{
    protected static ?string $heading = '5 Pegawai Terbaru';

    protected function getTableQuery(): Builder
    {
        return Employee::query()
            ->orderBy('joined_at', 'asc')
            ->limit(5); 
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('full_name')
                ->label('Full Name')
                ->sortable(),
            TextColumn::make('division')
                ->label('Divisi')
                ->sortable(),
            TextColumn::make('joined_at')
                ->label('Tanggal Bergabung')
                ->formatStateUsing(function ($state) {
                    setlocale(LC_TIME, 'id_ID.UTF-8'); 
                    return strftime('%d-%B-%Y', strtotime($state));
                })
                ->sortable(),
        ];
    }

    
    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }
}

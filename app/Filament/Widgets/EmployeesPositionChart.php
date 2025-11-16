<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use Filament\Widgets\ChartWidget;

class EmployeesPositionChart extends ChartWidget
{
    protected static ?string $heading = 'Pegawai per Divisi';

    protected function getData(): array
    {
        $positions = ['Staff','Admin','Supervisor','Manager','Intern'];

        
        $data = [];
        foreach ($positions as $position) {
            $count = Employee::where('position', $position)->count();
            $data[] = (int) $count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pegawai',
                    'data' => $data,
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => $positions, 
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'min' => 0,
                    'max' => 10,
                    'ticks' => [
                        'stepSize' => 1, 
                    ],
                ],
            ],
        ];
    }
}

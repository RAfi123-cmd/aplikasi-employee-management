<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployee extends CreateRecord
{
    protected static string $resource = EmployeeResource::class;

    protected static bool $canCreate = true;

    protected static bool $shouldNotify = false;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index', ['record' => $this->record]);
    }

    protected function getCreatedNotification(): ?Notification
    {
        return null;
    }
    
    protected function afterCreate(): void
    {
        Notification::make()
            ->title('Employee data added successfully')
            ->success()
            ->send();
    }
}

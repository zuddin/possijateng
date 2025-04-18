<?php

namespace App\Filament\Resources\AtletResource\Pages;

use App\Filament\Resources\AtletResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAtlet extends EditRecord
{
    protected static string $resource = AtletResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

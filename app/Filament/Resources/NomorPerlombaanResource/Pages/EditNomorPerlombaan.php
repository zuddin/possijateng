<?php

namespace App\Filament\Resources\NomorPerlombaanResource\Pages;

use App\Filament\Resources\NomorPerlombaanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNomorPerlombaan extends EditRecord
{
    protected static string $resource = NomorPerlombaanResource::class;

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

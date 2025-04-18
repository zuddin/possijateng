<?php

namespace App\Filament\Resources\NomorPerlombaanResource\Pages;

use App\Filament\Resources\NomorPerlombaanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNomorPerlombaan extends CreateRecord
{
    protected static string $resource = NomorPerlombaanResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

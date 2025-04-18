<?php

namespace App\Filament\Resources\AtletResource\Pages;

use App\Filament\Resources\AtletResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAtlet extends CreateRecord
{
    protected static string $resource = AtletResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

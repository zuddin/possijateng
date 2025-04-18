<?php

namespace App\Filament\Resources\NomorPerlombaanResource\Pages;

use App\Filament\Resources\NomorPerlombaanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNomorPerlombaans extends ListRecords
{
    protected static string $resource = NomorPerlombaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

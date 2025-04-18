<?php

namespace App\Filament\Resources\ClubResource\Pages;

use App\Filament\Resources\ClubResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClubs extends ListRecords
{
    protected static string $resource = ClubResource::class;
    public function getTitle(): string
    {
        return 'Data Club'; // Ganti sesuai keinginan Anda
    }
    public function getHeading(): string
    {
        return 'Data Club'; // Ganti sesuai keinginan Anda
    }
    public static function getCreateButtonLabel(): string
    {
        return 'New Club';
    }
   

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

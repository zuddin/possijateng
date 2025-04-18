<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationLabel = 'Events';
    protected static ?string $navigationGroup = 'Manajemen Perlombaan';
    protected static ?string $pluralLabel = 'Events';
    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->role === \App\Models\User::ROLE_ADMIN;
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('nama_event')->required()->label('Nama Event'),
                TextInput::make('tempat_pelaksanaan')->required()->label('Tempat Pelaksanaan'),
                DatePicker::make('tanggal_mulai')->required()->label('Tanggal Mulai'),
                DatePicker::make('tanggal_akhir')->required()->label('Tanggal Akhir'),
                TextInput::make('venue_event')->required()->label('Venue Event'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_event')->sortable()->searchable(),
                TextColumn::make('tempat_pelaksanaan')->sortable(),
                TextColumn::make('tanggal_mulai')->date()->sortable(),
                TextColumn::make('tanggal_akhir')->date()->sortable(),
                TextColumn::make('venue_event')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}

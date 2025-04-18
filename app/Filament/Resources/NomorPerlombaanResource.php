<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NomorPerlombaanResource\Pages;
use App\Filament\Resources\NomorPerlombaanResource\RelationManagers;
use App\Models\NomorPerlombaan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NomorPerlombaanResource extends Resource
{
    protected static ?string $model = NomorPerlombaan::class;

  

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationLabel = 'Nomor Perlombaan';
    protected static ?string $navigationGroup = 'Manajemen Perlombaan';
    protected static ?string $pluralLabel = 'Nomor Perlombaan';
    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->role === \App\Models\User::ROLE_ADMIN;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('event_id')
                    ->label('Event')
                    ->relationship('event', 'nama_event')
                    ->required()
                    ->searchable()
                    ->placeholder('Pilih Event'),

                Forms\Components\TextInput::make('noperlombaan')
                    ->label('No. Perlombaan')
                    ->placeholder('No. Perlombaan')
                    ->required()
                    ->unique(ignoreRecord: true),

                Forms\Components\TextInput::make('kelompokumur')
                    ->label('Kelompok Umur')
                    ->placeholder('Kelompok Umur')
                    ->required(),

                Forms\Components\Select::make('kelompok')
                    ->label('Kelompok')
                    ->options([
                        'putra' => 'Putra',
                        'putri' => 'Putri',
                    ])
                    ->required()
                    ->placeholder('Pilih Kelompok'),

                Forms\Components\TextInput::make('nomor_acara')
                    ->label('Nomor Acara')
                    ->placeholder('Nomor Acara')
                    ->required(),

                Forms\Components\DatePicker::make('waktu_pelaksanaan')
                    ->label('Waktu Pelaksanaan')
                    ->required(),

                Forms\Components\Select::make('jenislomba')
                    ->label('Jenis Lomba')
                    ->options([
                        'perorangan' => 'Perorangan',
                        'estafet' => 'Estafet',
                    ])
                    ->required()
                    ->placeholder('Pilih Jenis Lomba'),

                Forms\Components\TextInput::make('biaya_pendaftaran')
                    ->label('Biaya Pendaftaran')
                    ->placeholder('Biaya Pendaftaran')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('event.nama_event')
                ->label('Nama Event'),

                Tables\Columns\TextColumn::make('noperlombaan')
                    ->label('No. Perlombaan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('kelompokumur')
                    ->label('Kelompok Umur')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('kelompok')
                ->label('Kelompok')
                ->formatStateUsing(fn ($state) => match($state) {
                    'P' => 'Putra',
                    'L' => 'Putri',
                    default => $state,
                }),

                Tables\Columns\TextColumn::make('nomor_acara')
                    ->label('Nomor Acara')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('waktu_pelaksanaan')
                    ->label('Waktu Pelaksanaan')
                    ->dateTime()
                    ->sortable(),

                    Tables\Columns\TextColumn::make('jenislomba')
                    ->label('Jenis Lomba')
                    ->formatStateUsing(fn ($state) => [
                        'perorangan' => 'Perorangan',
                        'estafet' => 'Estafet',
                    ][$state] ?? $state),

                Tables\Columns\TextColumn::make('biaya_pendaftaran')
                    ->label('Biaya Pendaftaran')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNomorPerlombaans::route('/'),
            'create' => Pages\CreateNomorPerlombaan::route('/create'),
            'edit' => Pages\EditNomorPerlombaan::route('/{record}/edit'),
        ];
    }
}

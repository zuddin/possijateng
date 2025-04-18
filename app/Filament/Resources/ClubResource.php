<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClubResource\Pages;
use App\Filament\Resources\ClubResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClubResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationLabel = 'Data Club';

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Club Management';
    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->role === \App\Models\User::ROLE_PENGKABPENGKOT;
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function form(Form $form): Form
{
    return $form
        ->schema([

        //card
        Forms\Components\Card::make()
            ->schema([

            //name
            Forms\Components\TextInput::make('name')
                ->label('Name')
                ->placeholder('Name')
                ->required(),
            Forms\Components\TextInput::make('alamat')
                ->label('Alamat')
                ->maxLength(255),
             
             Forms\Components\TextInput::make('notelp')
                ->label('No. Telepon / WA')
                ->maxLength(20),
            //created_by
            Forms\Components\Hidden::make('role')
                ->default('Club'),

            //email
            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->placeholder('Email')
                ->unique(ignorable: fn ($record) => $record)
                ->required(),

            //password
            Forms\Components\TextInput::make('password')
                ->label('Password')
                ->placeholder('Password')
                ->dehydrateStateUsing(fn ($state) => $state ? bcrypt($state) : null)
                ->dehydrated(fn ($state) => filled($state)) // hanya mengubah password jika field diisi
                ->password(),
            //created_by
            Forms\Components\Hidden::make('created_by')
                ->default(auth()->user()->id),
                

            ])

        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('name')->searchable(),
            Tables\Columns\TextColumn::make('alamat')->searchable(),
            Tables\Columns\TextColumn::make('notelp')->searchable(),
            Tables\Columns\TextColumn::make('email')->searchable(),
            // Tambahkan ini untuk menampilkan nama pembuat (creator)
            Tables\Columns\TextColumn::make('createdBy.name')
                ->label('Created By')
                            ->sortable()
                            ->searchable(),
                        Tables\Columns\TextColumn::make('created_at')->dateTime(),
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('created_by', auth()->id());
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
            'index' => Pages\ListClubs::route('/'),
            'create' => Pages\CreateClub::route('/create'),
            'edit' => Pages\EditClub::route('/{record}/edit'),
        ];
    }

//pembatasan hak akses

}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationLabel = 'Data User';

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Users Management';
    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->role === \App\Models\User::ROLE_ADMIN;
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
                ->label('No. Telepon')
                ->maxLength(20),
            
            Forms\Components\Select::make('role')    
            ->options([    
                User::ROLE_ADMIN => __('Admin'),    
                User::ROLE_PENGKABPENGKOT => __('Pengkab/Pengkot'),    
                User::ROLE_CLUB => __('Club'),    
                User::ROLE_ATLET => __('Atlet'),    
            ])     
            ->required(),

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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }


}

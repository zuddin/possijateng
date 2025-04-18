<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AtletResource\Pages;
use App\Filament\Resources\AtletResource\RelationManagers;
use App\Models\Atlet;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class AtletResource extends Resource
{
    protected static ?string $model = Atlet::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';
    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->role === \App\Models\User::ROLE_CLUB;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                Forms\Components\TextInput::make('password')
                    ->password()
                    ->minLength(8)
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->required(fn ($livewire) => !$livewire->record),

                Forms\Components\Textarea::make('alamat')
                    ->maxLength(255)
                    ->nullable(),

                Forms\Components\TextInput::make('notelp')
                    ->maxLength(20)
                    ->nullable(),

                Forms\Components\TextInput::make('nik')
                    ->maxLength(20)
                    ->nullable(),

                Forms\Components\TextInput::make('nama_ibu')
                    ->maxLength(255)
                    ->nullable(),

                Forms\Components\TextInput::make('nama_ayah')
                    ->maxLength(255)
                    ->nullable(),

                Forms\Components\TextInput::make('nias')
                    ->maxLength(20)
                    ->nullable(),

                Forms\Components\DatePicker::make('tanggal_lahir')
                    ->nullable(),

                Forms\Components\TextInput::make('asal_sekolah_instansi')
                    ->maxLength(255)
                    ->nullable(),

                Forms\Components\Select::make('jenis_kelamin')
                    ->options([
                        'putra' => 'Putra',
                        'putri' => 'Putri',
                    ])
                    ->nullable(),

                Forms\Components\Hidden::make('created_by')
                    ->default(fn () => auth()->id()),

                Forms\Components\Hidden::make('pengkabpengkot')
                    ->default(fn () => auth()->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('alamat')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('notelp')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('nik')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('nama_ibu')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('nama_ayah')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('nias')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')->date()->sortable(),
                Tables\Columns\TextColumn::make('asal_sekolah_instansi')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('jenis_kelamin')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('created_by.name')->label('Created By')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('pengkabpengkot.name')->label('Pengkabpengkot')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->filters([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAtlets::route('/'),
            'create' => Pages\CreateAtlet::route('/create'),
            'edit' => Pages\EditAtlet::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['createdBy', 'pengkabpengkotUser']);
    }
}

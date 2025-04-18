<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CartResource\Pages;
use App\Filament\Resources\CartResource\RelationManagers;
use App\Models\Cart;
use App\Models\NomorPerlombaan;
use App\Models\Atlet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CartResource extends Resource
{
    protected static ?string $model = Cart::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationGroup = 'Pendaftaran Perlombaan';

    public static function getNavigationSort(): ?int
    {
        return 4;
    }
    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomorPerlombaan.event.nama_event')->label('Event'),
                Tables\Columns\TextColumn::make('nomorPerlombaan.noperlombaan')->searchable(),
                Tables\Columns\TextColumn::make('atlets.name')->searchable(),
                Tables\Columns\TextColumn::make('catatan_waktu'),
                Tables\Columns\TextColumn::make('nomorPerlombaan.biaya_pendaftaran')
                ->label('Biaya Pendaftaran')
                ->money('IDR', locale: 'id')
                ->getStateUsing(fn($record) => $record->nomorPerlombaan?->biaya_pendaftaran ?? '-'),

            ])
            ->filters([
                //
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListCarts::route('/'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('name')
                ->required()
                ->maxLength(255),
            Textarea::make('description')
                ->maxLength(65535)
                ->columnSpanFull(), // Membuat textarea mengambil lebar penuh
            TextInput::make('price')
                ->required()
                ->numeric()
                ->prefix('Rp') // Menambahkan awalan mata uang
                ->step(0.01), // Mengizinkan nilai desimal
            Toggle::make('is_active')
                ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable() // Mengizinkan pencarian berdasarkan nama
                    ->sortable(),  // Mengizinkan pengurutan berdasarkan nama
                TextColumn::make('price')
                    ->money('IDR') // Memformat sebagai mata uang Indonesia
                    ->sortable(),
                IconColumn::make('is_active')
                    ->boolean() // Menampilkan ikon centang/silang
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // Sembunyikan default, bisa diaktifkan user
            ])
            ->filters([
                // Anda bisa menambahkan filter di sini nanti
            ])
            ->actions([
                Tables\Actions\EditAction::make(),    // Tombol Edit
                Tables\Actions\DeleteAction::make(),  // Tombol Delete
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(), // Aksi hapus massal
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}

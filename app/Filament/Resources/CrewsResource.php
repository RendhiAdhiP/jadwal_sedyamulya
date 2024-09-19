<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CrewsResource\Pages;
use App\Filament\Resources\CrewResource\RelationManagers;
use App\Models\Crews;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CrewsResource extends Resource
{
    protected static ?string $model = Crews::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_crew')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(999),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->revealable(),
                Forms\Components\TextInput::make('nama'),
                Forms\Components\Select::make('kategori')
                    ->options([
                        'Driver' => 'Driver',
                        'Co Driver' => 'Co Driver',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_crew')->sortable(),
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('kategori')->sortable(),
            ])
            ->filters([
                SelectFilter::make('kategori')
                    ->options([
                        'Driver' => 'Diver',
                        'Co Driver' => 'Co Driver',
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListCrews::route('/'),
            'create' => Pages\CreateCrew::route('/create'),
            'edit' => Pages\EditCrew::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalResource\Pages;
use App\Filament\Resources\JadwalResource\RelationManagers;
use App\Models\Crews;
use App\Models\Jadwal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JadwalResource extends Resource
{
    protected static ?string $model = Jadwal::class; //Jadwal::with('crews')->get(); ;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('tanggal'),
                Forms\Components\Select::make('bus')->label('Bus')
                ->options([
                    'MASARTO' => 'MASARTO',
                    'MASBOGIE' => 'MASBOGIE',
                    'SHAYNA' => 'SHAYNA',
                    'NAJWA' => 'NAJWA',
                    'JULIAN' => 'JULIAN',
                    'KARTIKA' => 'KARTIKA',
                    'ABIYOSO' => 'ABIYOSO',
                ])
                ->default('MASARTO')
                ->required(),
                Forms\Components\TextInput::make('start')->label('Penjemputan'),
                Forms\Components\TextInput::make('finish')->label('Tujuan'),
                Forms\Components\Select::make('crew1_id')
                    ->label('Driver')
                    ->options(fn () => Crews::where('kategori', 'Driver')->pluck('nama', 'id'))
                    ->required(),
                Forms\Components\Select::make('crew2_id')
                    ->label('Co Driver')
                    ->options(fn () => Crews::where('kategori', 'Co Driver')->pluck('nama', 'id')),
                Forms\Components\Textarea::make('keterangan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        // dd(Jadwal::with('crews')->get());
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('bus')->label('Bus')->extraAttributes(['style' => 'width: 100px']),
                Tables\Columns\TextColumn::make('tanggal')->label('Tanggal')->extraAttributes(['style' => 'width: 120px']),
                Tables\Columns\TextColumn::make('start')->label('Penjemputan')->extraAttributes(['style' => 'width: 150px']),
                Tables\Columns\TextColumn::make('finish')->label('Tujuan')->extraAttributes(['style' => 'width: 150px']),
                Tables\Columns\TextColumn::make('crew1.nama')->label('Driver')->extraAttributes(['style' => 'width: 100px']),
                Tables\Columns\TextColumn::make('crew2.nama')->label('Co Driver')->extraAttributes(['style' => 'width: 100px']),
                Tables\Columns\TextColumn::make('keterangan')->label('Keterangan')->extraAttributes(['style' => 'width: 300px']),
            ])
            ->filters([
                //
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
            'index' => Pages\ListJadwals::route('/'),
            'create' => Pages\CreateJadwal::route('/create'),
            'edit' => Pages\EditJadwal::route('/{record}/edit'),
        ];
    }
}

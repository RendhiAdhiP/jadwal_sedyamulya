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
                Forms\Components\TextInput::make('start'),
                Forms\Components\TextInput::make('finish'),
                Forms\Components\Select::make('crew1_id')->relationship('crews', 'nama')->required(),
                Forms\Components\Select::make('crew2_id')->relationship('crews', 'nama'),
                Forms\Components\Select::make('crew3_id')->relationship('crews', 'nama'),
                Forms\Components\Textarea::make('keterangan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        // dd(Jadwal::with('crews')->get());
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tanggal')->label('Tanggal')->extraAttributes(['style' => 'width: 120px']),
                Tables\Columns\TextColumn::make('start')->label('Start')->extraAttributes(['style' => 'width: 100px']),
                Tables\Columns\TextColumn::make('finish')->label('Finish')->extraAttributes(['style' => 'width: 100px']),
                Tables\Columns\TextColumn::make('crew1.nama')->label('Crew 1')->extraAttributes(['style' => 'width: 150px']),
                Tables\Columns\TextColumn::make('crew2.nama')->label('Crew 2')->extraAttributes(['style' => 'width: 150px']),
                Tables\Columns\TextColumn::make('crew3.nama')->label('Crew 3')->extraAttributes(['style' => 'width: 150px']),
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

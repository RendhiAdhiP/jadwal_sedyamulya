<?php

namespace App\Filament\Resources\CrewsResource\Pages;

use App\Filament\Resources\CrewsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCrews extends ListRecords
{
    protected static string $resource = CrewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

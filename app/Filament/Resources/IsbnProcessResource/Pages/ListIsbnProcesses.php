<?php

namespace App\Filament\Resources\IsbnProcessResource\Pages;

use App\Filament\Resources\IsbnProcessResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIsbnProcesses extends ListRecords
{
    protected static string $resource = IsbnProcessResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\IsbnProcessResource\Pages;

use App\Filament\Resources\IsbnProcessResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIsbnProcess extends EditRecord
{
    protected static string $resource = IsbnProcessResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

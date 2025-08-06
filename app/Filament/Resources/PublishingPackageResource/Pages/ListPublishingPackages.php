<?php

namespace App\Filament\Resources\PublishingPackageResource\Pages;

use App\Filament\Resources\PublishingPackageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPublishingPackages extends ListRecords
{
    protected static string $resource = PublishingPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

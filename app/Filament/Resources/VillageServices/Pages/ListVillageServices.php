<?php

namespace App\Filament\Resources\VillageServices\Pages;

use App\Filament\Resources\VillageServices\VillageServiceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVillageServices extends ListRecords
{
    protected static string $resource = VillageServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

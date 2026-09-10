<?php

namespace App\Filament\Resources\VillageServices\Pages;

use App\Filament\Resources\VillageServices\VillageServiceResource;
use Filament\Resources\Pages\CreateRecord;

class CreateVillageService extends CreateRecord
{
    protected static string $resource = VillageServiceResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
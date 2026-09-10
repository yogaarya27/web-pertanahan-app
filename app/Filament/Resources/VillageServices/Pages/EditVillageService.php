<?php

namespace App\Filament\Resources\VillageServices\Pages;

use App\Filament\Resources\VillageServices\VillageServiceResource;
use Filament\Resources\Pages\EditRecord;

class EditVillageService extends EditRecord
{
    protected static string $resource = VillageServiceResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
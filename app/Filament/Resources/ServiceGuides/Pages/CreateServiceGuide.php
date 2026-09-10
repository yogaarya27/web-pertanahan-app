<?php

namespace App\Filament\Resources\ServiceGuides\Pages;

use App\Filament\Resources\ServiceGuides\ServiceGuideResource;
use Filament\Resources\Pages\CreateRecord;

class CreateServiceGuide extends CreateRecord
{
    protected static string $resource = ServiceGuideResource::class;

    protected function getRedirectUrl(): string
    {
        return ServiceGuideResource::getUrl();
    }
}
<?php

namespace App\Filament\Resources\ServiceGuides\Pages;

use App\Filament\Resources\ServiceGuides\ServiceGuideResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListServiceGuides extends ListRecords
{
    protected static string $resource = ServiceGuideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

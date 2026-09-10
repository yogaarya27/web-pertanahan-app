<?php

namespace App\Filament\Resources\TentangDesas\Pages;

use App\Filament\Resources\TentangDesas\TentangDesaResource;
use Filament\Resources\Pages\ListRecords;

class ListTentangDesas extends ListRecords
{
    protected static string $resource = TentangDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
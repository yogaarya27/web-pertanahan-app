<?php

namespace App\Filament\Resources\TentangDesas\Pages;

use App\Filament\Resources\TentangDesas\TentangDesaResource;
use Filament\Resources\Pages\EditRecord;

class EditTentangDesa extends EditRecord
{
    protected static string $resource = TentangDesaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
<?php

namespace App\Filament\Resources\DataPertanahan\Pages;

use App\Filament\Resources\DataPertanahan\DataPertanahanResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDataPertanahan extends CreateRecord
{
    protected static string $resource = DataPertanahanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

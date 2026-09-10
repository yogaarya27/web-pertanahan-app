<?php

namespace App\Filament\Resources\DataPertanahan\Pages;

use App\Filament\Imports\DataPertanahanImporter;
use App\Filament\Resources\DataPertanahan\DataPertanahanResource;
use Filament\Actions\CreateAction;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;

class ListDataPertanahan extends ListRecords
{
    protected static string $resource = DataPertanahanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),

            ImportAction::make()
                ->importer(DataPertanahanImporter::class)
                ->label('Import Excel'),

            ExportAction::make()
                ->label('Export Excel'),
        ];
    }
}

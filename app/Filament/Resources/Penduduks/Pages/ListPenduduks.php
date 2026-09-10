<?php

namespace App\Filament\Resources\Penduduks\Pages;

use App\Filament\Imports\PendudukImporter;
use App\Filament\Resources\Penduduks\PendudukResource;
use Filament\Actions\CreateAction;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;

class ListPenduduks extends ListRecords
{
    protected static string $resource = PendudukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),

            ImportAction::make()
                ->importer(PendudukImporter::class)
                ->label('Import Excel'),

            ExportAction::make()
                ->label('Export Excel'),
        ];
    }
}
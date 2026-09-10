<?php

namespace App\Filament\Imports;

use App\Models\DataPertanahan;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class DataPertanahanImporter extends Importer
{
    protected static ?string $model = DataPertanahan::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nama_perumahan')
                ->requiredMapping()
                ->label('Nama Perumahan'),
            ImportColumn::make('peruntukan')
                ->requiredMapping()
                ->label('Peruntukan'),
            ImportColumn::make('luas')
                ->requiredMapping()
                ->label('Luas'),
            ImportColumn::make('kelurahan')
                ->requiredMapping()
                ->label('Kelurahan'),
            ImportColumn::make('kecamatan')
                ->requiredMapping()
                ->label('Kecamatan'),
            ImportColumn::make('bukti_perolehan')
                ->requiredMapping()
                ->label('Bukti Perolehan'),
            ImportColumn::make('status_saat_ini')
                ->requiredMapping()
                ->label('Status Saat Ini'),
            ImportColumn::make('penyerahan_ke_bagian_aset')
                ->label('Penyerahan Ke Bagian Aset'),
            ImportColumn::make('peta_bidang')
                ->label('Peta Bidang'),
            ImportColumn::make('peta_spasial')
                ->label('Peta Spasial'),
        ];
    }
}

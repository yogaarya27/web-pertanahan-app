<?php

namespace App\Filament\Imports;

use App\Models\Penduduk;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Number;

class PendudukImporter extends Importer
{
    protected static ?string $model = Penduduk::class;

    public static function getColumns(): array
    {
        return [
ImportColumn::make('nik')
    ->requiredMapping()
    ->castStateUsing(function ($state) {

        if (str_contains((string) $state, 'E+')) {
            return number_format((float) $state, 0, '', '');
        }

        return preg_replace('/[^0-9]/', '', (string) $state);
    }),

ImportColumn::make('no_kk')
    ->requiredMapping()
    ->castStateUsing(function ($state) {

        if (str_contains((string) $state, 'E+')) {
            return number_format((float) $state, 0, '', '');
        }

        return preg_replace('/[^0-9]/', '', (string) $state);
    }),
            ImportColumn::make('nama')->requiredMapping(),
            ImportColumn::make('jenis_kelamin')->requiredMapping(),
            ImportColumn::make('tempat_lahir'),
            ImportColumn::make('tanggal_lahir')->requiredMapping(),
            ImportColumn::make('dusun')->requiredMapping(),
            ImportColumn::make('rt'),
            ImportColumn::make('rw'),
            ImportColumn::make('agama'),
            ImportColumn::make('pendidikan'),
            ImportColumn::make('pekerjaan'),
            ImportColumn::make('status_perkawinan'),
            ImportColumn::make('status_penduduk')->requiredMapping(),
        ];
    }

    public function resolveRecord(): Penduduk
    {
        return Penduduk::firstOrNew([
            'nik' => $this->data['nik'],
        ]);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Import selesai. ' .
            Number::format($import->successful_rows) .
            ' data berhasil diimport.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' .
                Number::format($failedRowsCount) .
                ' data gagal diimport.';
        }

        return $body;
    }
}
<?php

namespace App\Filament\Resources\Penduduks\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PendudukInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nik'),
                TextEntry::make('no_kk'),
                TextEntry::make('nama'),
                TextEntry::make('jenis_kelamin')
                    ->badge(),
                TextEntry::make('tempat_lahir')
                    ->placeholder('-'),
                TextEntry::make('tanggal_lahir')
                    ->date(),
                TextEntry::make('dusun'),
                TextEntry::make('rt')
                    ->placeholder('-'),
                TextEntry::make('rw')
                    ->placeholder('-'),
                TextEntry::make('agama')
                    ->badge()
                    ->placeholder('-'),
                TextEntry::make('pendidikan')
                    ->placeholder('-'),
                TextEntry::make('pekerjaan')
                    ->placeholder('-'),
                TextEntry::make('status_perkawinan')
                    ->badge()
                    ->placeholder('-'),
                TextEntry::make('status_penduduk')
                    ->badge(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}

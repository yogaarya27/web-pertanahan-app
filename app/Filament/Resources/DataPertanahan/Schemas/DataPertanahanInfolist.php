<?php

namespace App\Filament\Resources\DataPertanahan\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DataPertanahanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Data Pertanahan')
                    ->schema([
                        TextEntry::make('nama_perumahan')
                            ->label('Nama Perumahan'),
                        TextEntry::make('peruntukan')
                            ->label('Peruntukan'),
                        TextEntry::make('luas')
                            ->label('Luas'),
                        TextEntry::make('kelurahan')
                            ->label('Kelurahan'),
                        TextEntry::make('kecamatan')
                            ->label('Kecamatan'),
                        TextEntry::make('bukti_perolehan')
                            ->label('File BA')
                            ->formatStateUsing(fn (?string $state) => $state ? 'Buka file BA' : '-')
                            ->url(fn (?string $state) => $state ? asset('storage/' . $state) : null)
                            ->openUrlInNewTab(),
                        TextEntry::make('status_saat_ini')
                            ->label('Status Saat Ini')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'belum diproses' => 'warning',
                                'proses pensertifikatan' => 'info',
                                'sertifikat terbit' => 'success',
                            }),
                        ImageEntry::make('peta_bidang')
                            ->label('Peta Bidang')
                            ->disk('public')
                            ->columnSpanFull(),
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('peta_spasial')
                                    ->label('Peta Spasial')
                                    ->url(fn (?string $state) => $state)
                                    ->openUrlInNewTab(),
                                TextEntry::make('penyerahan_ke_bagian_aset')
                                    ->label('File BAST kepada Aset')
                                    ->formatStateUsing(fn (?string $state) => $state ? 'Buka file BAST' : '-')
                                    ->url(fn (?string $state) => $state ? asset('storage/' . $state) : null)
                                    ->openUrlInNewTab(),
                            ])
                            ->columnSpanFull(),
                        TextEntry::make('nomor_sertifikat')
                            ->label('Nomor Sertifikat')
                            ->placeholder('-'),
                        TextEntry::make('created_at')
                            ->label('Dibuat')
                            ->dateTime('d/m/Y H:i'),
                        TextEntry::make('updated_at')
                            ->label('Diperbarui')
                            ->dateTime('d/m/Y H:i'),
                    ])->columns(2),
            ]);
    }
}

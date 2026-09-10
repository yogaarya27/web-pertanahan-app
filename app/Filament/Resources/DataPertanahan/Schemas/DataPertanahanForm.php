<?php

namespace App\Filament\Resources\DataPertanahan\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DataPertanahanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_perumahan')
                    ->label('Nama Perumahan')
                    ->required()
                    ->maxLength(255),
                TextInput::make('peruntukan')
                    ->label('Peruntukan')
                    ->required()
                    ->maxLength(255),
                TextInput::make('luas')
                    ->label('Luas')
                    ->required()
                    ->maxLength(255),
                TextInput::make('kelurahan')
                    ->label('Kelurahan')
                    ->required()
                    ->maxLength(255),
                TextInput::make('kecamatan')
                    ->label('Kecamatan')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('bukti_perolehan')
                    ->label('File BA')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required()
                    ->maxSize(10240)
                    ->disk('public')
                    ->directory('data-pertanahan/ba')
                    ->preserveFilenames(),
                Select::make('status_saat_ini')
                    ->label('Status Saat Ini')
                    ->options([
                        'belum diproses' => 'Belum Diproses',
                        'proses pensertifikatan' => 'Proses Pensertifikatan',
                        'sertifikat terbit' => 'Sertifikat Terbit',
                    ])
                    ->default('belum diproses')
                    ->required(),
                FileUpload::make('penyerahan_ke_bagian_aset')
                    ->label('File BAST kepada Aset')
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(10240)
                    ->disk('public')
                    ->directory('data-pertanahan/bast-aset')
                    ->preserveFilenames(),
                FileUpload::make('peta_bidang')
                    ->label('Peta Bidang (Gambar)')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                    ->maxSize(10240) // 10MB
                    ->disk('public')
                    ->directory('peta_bidang')
                    ->preserveFilenames()
                    ->image()
                    ->previewable(true),
                TextInput::make('peta_spasial')
                    ->label('Peta Spasial (Link URL)')
                    ->placeholder('https://example.com/peta')
                    ->url()
                    ->maxLength(255),
                TextInput::make('nomor_sertifikat')
                    ->label('Nomor Sertifikat')
                    ->maxLength(255),
            ]);
    }
}

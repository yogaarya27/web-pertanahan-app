<?php

namespace App\Filament\Resources\TentangDesas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TentangDesaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('populasi')
                    ->label('Populasi')
                    ->numeric()
                    ->required(),

                TextInput::make('luas_wilayah')
                    ->label('Luas Wilayah')
                    ->placeholder('Contoh: 662 Ha')
                    ->required(),

                TextInput::make('jumlah_rumah_tangga')
                    ->label('Jumlah Rumah Tangga')
                    ->numeric()
                    ->required(),
TextInput::make('jumlah_rumah_tangga')
    ->label('Jumlah Rumah Tangga')
    ->numeric()
    ->required(),

TextInput::make('jumlah_kk')
    ->label('Jumlah KK')
    ->numeric(),

TextInput::make('jumlah_dusun')
    ->label('Jumlah Dusun')
    ->numeric(),
                Textarea::make('visi')
                    ->label('Visi Desa')
                    ->rows(5)
                    ->required(),

                Textarea::make('misi')
                    ->label('Misi Desa')
                    ->rows(8)
                    ->required(),

                Textarea::make('sejarah_desa')
                    ->label('Sejarah Desa')
                    ->rows(10),

FileUpload::make('gambar_sejarah')
    ->label('Gambar Sejarah Desa')
    ->image()
    ->disk('public')
    ->directory('sejarah-desa')
    ->visibility('public')
    ->imageEditor()
    ->openable()
    ->downloadable()
    ->previewable(true)
    ->columnSpanFull(),

                TextInput::make('batas_utara')
                    ->label('Batas Wilayah Utara'),

                TextInput::make('batas_timur')
                    ->label('Batas Wilayah Timur'),

                TextInput::make('batas_selatan')
                    ->label('Batas Wilayah Selatan'),

                TextInput::make('batas_barat')
                    ->label('Batas Wilayah Barat'),

                Textarea::make('lokasi_desa')
                    ->label('Embed Google Maps')
                    ->rows(8)
                    ->placeholder('<iframe src=...></iframe>'),

            ]);
    }
}
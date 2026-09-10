<?php

namespace App\Filament\Resources\TentangDesas\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TentangDesasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

ImageColumn::make('gambar_sejarah')
    ->label('Gambar')
    ->disk('public')
    ->square()
    ->height(40),

                TextColumn::make('populasi')
                    ->label('Populasi')
                    ->badge()
                    ->color('primary')
                    ->sortable(),

                TextColumn::make('luas_wilayah')
                    ->label('Luas Wilayah')
                    ->badge()
                    ->color('success'),

                TextColumn::make('jumlah_rumah_tangga')
                    ->label('Rumah Tangga')
                    ->badge()
                    ->color('warning'),
TextColumn::make('jumlah_kk')
    ->label('Jumlah KK')
    ->badge(),

TextColumn::make('jumlah_dusun')
    ->label('Dusun')
    ->badge(),
                TextColumn::make('visi')
                    ->label('Visi')
                    ->limit(40)
                    ->wrap(),

                TextColumn::make('misi')
                    ->label('Misi')
                    ->limit(40)
                    ->wrap(),

                TextColumn::make('batas_utara')
                    ->label('Utara')
                    ->badge()
                    ->color('gray'),

                TextColumn::make('batas_timur')
                    ->label('Timur')
                    ->badge()
                    ->color('info'),

                TextColumn::make('batas_selatan')
                    ->label('Selatan')
                    ->badge()
                    ->color('danger'),

                TextColumn::make('batas_barat')
                    ->label('Barat')
                    ->badge()
                    ->color('success'),

            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
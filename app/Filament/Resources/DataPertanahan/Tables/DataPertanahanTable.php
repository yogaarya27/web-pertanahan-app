<?php

namespace App\Filament\Resources\DataPertanahan\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class DataPertanahanTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_perumahan')
                    ->label('Nama Perumahan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('peruntukan')
                    ->label('Peruntukan')
                    ->searchable(),
                TextColumn::make('luas')
                    ->label('Luas')
                    ->searchable(),
                TextColumn::make('kelurahan')
                    ->label('Kelurahan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('kecamatan')
                    ->label('Kecamatan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('bukti_perolehan')
                    ->label('File BA')
                    ->formatStateUsing(fn (?string $state) => $state ? 'Buka file BA' : '-')
                    ->url(fn (?string $state) => $state ? asset('storage/' . $state) : null)
                    ->openUrlInNewTab()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('status_saat_ini')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'belum diproses' => 'warning',
                        'proses pensertifikatan' => 'info',
                        'sertifikat terbit' => 'success',
                    })
                    ->sortable(),
                ImageColumn::make('peta_bidang')
                    ->label('Peta Bidang')
                    ->disk('public')
                    ->width(100)
                    ->height(100)
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('peta_spasial')
                    ->label('Peta Spasial')
                    ->formatStateUsing(fn (?string $state) => $state ? '🔗 Lihat Peta' : '-')
                    ->url(fn (?string $state) => $state)
                    ->openUrlInNewTab()
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('nomor_sertifikat')
                    ->label('Nomor Sertifikat')
                    ->placeholder('-'),
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('penyerahan_ke_bagian_aset')
                    ->label('File BAST kepada Aset')
                    ->formatStateUsing(fn (?string $state) => $state ? 'Buka file BAST' : '-')
                    ->url(fn (?string $state) => $state ? asset('storage/' . $state) : null)
                    ->openUrlInNewTab(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ExportBulkAction::make()
                        ->label('Export Excel'),
                ]),
            ]);
    }
}

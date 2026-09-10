<?php

namespace App\Filament\Resources\Penduduks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
class PenduduksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nik')
                    ->searchable(),
                TextColumn::make('no_kk')
                    ->searchable(),
                TextColumn::make('nama') 
                    ->searchable(),
                TextColumn::make('jenis_kelamin')
                    ->badge(),
                TextColumn::make('tempat_lahir')
                    ->searchable(),
                TextColumn::make('tanggal_lahir')
                    ->date()
                    ->sortable(),
                TextColumn::make('dusun')
                    ->searchable(),
                TextColumn::make('rt')
                    ->searchable(),
                TextColumn::make('rw')
                    ->searchable(),
                TextColumn::make('agama')
                    ->badge(),
                TextColumn::make('pendidikan')
                    ->searchable(),
                TextColumn::make('pekerjaan')
                    ->searchable(),
                TextColumn::make('status_perkawinan')
                    ->badge(),
                TextColumn::make('status_penduduk')
                    ->badge(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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

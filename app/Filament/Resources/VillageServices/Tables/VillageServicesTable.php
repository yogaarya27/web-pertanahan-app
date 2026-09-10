<?php

namespace App\Filament\Resources\VillageServices\Tables;

use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Table;

class VillageServicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('nama_layanan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('estimasi_waktu')
                    ->label('Estimasi'),

                Tables\Columns\TextColumn::make('biaya')
                    ->badge()
                    ->color('success'),

                Tables\Columns\IconColumn::make('status')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->date('d M Y')
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }
}
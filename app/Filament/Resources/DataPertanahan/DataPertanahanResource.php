<?php

namespace App\Filament\Resources\DataPertanahan;

use App\Filament\Resources\DataPertanahan\Pages\CreateDataPertanahan;
use App\Filament\Resources\DataPertanahan\Pages\EditDataPertanahan;
use App\Filament\Resources\DataPertanahan\Pages\ListDataPertanahan;
use App\Filament\Resources\DataPertanahan\Pages\ViewDataPertanahan;
use App\Filament\Resources\DataPertanahan\Schemas\DataPertanahanForm;
use App\Filament\Resources\DataPertanahan\Schemas\DataPertanahanInfolist;
use App\Filament\Resources\DataPertanahan\Tables\DataPertanahanTable;
use App\Models\DataPertanahan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DataPertanahanResource extends Resource
{
    protected static ?string $model = DataPertanahan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMapPin;

    protected static ?string $recordTitleAttribute = 'nama_perumahan';

    public static function getModelLabel(): string
    {
        return 'Data Pertanahan';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Data Pertanahan';
    }

    public static function getNavigationLabel(): string
    {
        return 'Data Pertanahan';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Aset';
    }

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return DataPertanahanForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DataPertanahanInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataPertanahanTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDataPertanahan::route('/'),
            'create' => CreateDataPertanahan::route('/create'),
            'view' => ViewDataPertanahan::route('/{record}'),
            'edit' => EditDataPertanahan::route('/{record}/edit'),
        ];
    }
}

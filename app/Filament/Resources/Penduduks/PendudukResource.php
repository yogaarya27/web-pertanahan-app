<?php

namespace App\Filament\Resources\Penduduks;

use App\Filament\Resources\Penduduks\Pages\CreatePenduduk;
use App\Filament\Resources\Penduduks\Pages\EditPenduduk;
use App\Filament\Resources\Penduduks\Pages\ListPenduduks;
use App\Filament\Resources\Penduduks\Pages\ViewPenduduk;
use App\Filament\Resources\Penduduks\Schemas\PendudukForm;
use App\Filament\Resources\Penduduks\Schemas\PendudukInfolist;
use App\Filament\Resources\Penduduks\Tables\PenduduksTable;
use App\Models\Penduduk;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PendudukResource extends Resource
{
    protected static ?string $model = Penduduk::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static ?string $recordTitleAttribute = 'nama';

    protected static bool $shouldRegisterNavigation = false;

public static function getModelLabel(): string
{
    return 'Penduduk';
}

public static function getPluralModelLabel(): string
{
    return 'Penduduk';
}

public static function getNavigationLabel(): string
{
    return 'Penduduk';
}

public static function getNavigationGroup(): ?string
{
    return 'Profil';
}

    protected static ?int $navigationSort = 99;

    public static function form(Schema $schema): Schema
    {
        return PendudukForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PendudukInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PenduduksTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPenduduks::route('/'),
            'create' => CreatePenduduk::route('/create'),
            'view' => ViewPenduduk::route('/{record}'),
            'edit' => EditPenduduk::route('/{record}/edit'),
        ];
    }
}
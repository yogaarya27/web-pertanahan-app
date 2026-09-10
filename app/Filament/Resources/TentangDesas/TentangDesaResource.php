<?php

namespace App\Filament\Resources\TentangDesas;

use App\Filament\Resources\TentangDesas\Pages\CreateTentangDesa;
use App\Filament\Resources\TentangDesas\Pages\EditTentangDesa;
use App\Filament\Resources\TentangDesas\Pages\ListTentangDesas;
use App\Filament\Resources\TentangDesas\Schemas\TentangDesaForm;
use App\Filament\Resources\TentangDesas\Tables\TentangDesasTable;
use App\Models\TentangDesa;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TentangDesaResource extends Resource
{
    protected static ?string $model = TentangDesa::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static ?string $navigationLabel = 'Tentang Bidang Pertanahan';

    protected static ?string $pluralModelLabel = 'Tentang Bidang Pertanahan';

    protected static ?string $modelLabel = 'Tentang Bidang Pertanahan';

    protected static string|\UnitEnum|null $navigationGroup = 'Profil';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'visi';

    public static function form(Schema $schema): Schema
    {
        return TentangDesaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TentangDesasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTentangDesas::route('/'),
            'edit' => EditTentangDesa::route('/{record}/edit'),
        ];
    }
}
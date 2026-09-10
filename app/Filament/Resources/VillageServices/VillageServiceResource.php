<?php

namespace App\Filament\Resources\VillageServices;

use App\Filament\Resources\VillageServices\Pages\CreateVillageService;
use App\Filament\Resources\VillageServices\Pages\EditVillageService;
use App\Filament\Resources\VillageServices\Pages\ListVillageServices;
use App\Filament\Resources\VillageServices\Schemas\VillageServiceForm;
use App\Filament\Resources\VillageServices\Tables\VillageServicesTable;
use App\Models\VillageService;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VillageServiceResource extends Resource
{
    protected static ?string $model = VillageService::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_layanan';

    protected static ?string $navigationLabel = 'Layanan Desa';

    protected static ?string $modelLabel = 'Layanan Desa';


protected static ?string $pluralModelLabel = 'Layanan Desa';

protected static string|\UnitEnum|null $navigationGroup = 'Informasi Layanan';

protected static bool $shouldRegisterNavigation = false;

protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return VillageServiceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VillageServicesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListVillageServices::route('/'),
            'create' => CreateVillageService::route('/create'),
            'edit' => EditVillageService::route('/{record}/edit'),
        ];
    }
}
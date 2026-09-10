<?php

namespace App\Filament\Resources\ServiceGuides;

use App\Filament\Resources\ServiceGuides\Pages\CreateServiceGuide;
use App\Filament\Resources\ServiceGuides\Pages\EditServiceGuide;
use App\Filament\Resources\ServiceGuides\Pages\ListServiceGuides;
use App\Filament\Resources\ServiceGuides\Schemas\ServiceGuideForm;
use App\Filament\Resources\ServiceGuides\Tables\ServiceGuidesTable;
use App\Models\ServiceGuide;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ServiceGuideResource extends Resource
{
    protected static ?string $model = ServiceGuide::class;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static ?string $recordTitleAttribute = 'judul';

    protected static ?string $navigationLabel = 'Panduan Layanan';

    protected static ?string $modelLabel = 'Panduan Layanan';

protected static ?string $pluralModelLabel = 'Panduan Layanan';

protected static string|\UnitEnum|null $navigationGroup = 'Informasi Layanan';

protected static bool $shouldRegisterNavigation = false;

protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return ServiceGuideForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServiceGuidesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListServiceGuides::route('/'),
            'create' => CreateServiceGuide::route('/create'),
            'edit' => EditServiceGuide::route('/{record}/edit'),
        ];
    }
}
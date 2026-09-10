<?php

namespace App\Filament\Resources\ServiceGuides\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class ServiceGuideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255),

Forms\Components\FileUpload::make('gambar')
    ->image()
    ->disk('public')
    ->directory('service-guides')
    ->required(), 

                Forms\Components\TextInput::make('urutan')
                    ->numeric()
                    ->default(0),

                Forms\Components\Toggle::make('status')
                    ->default(true),

            ]);
    }
}
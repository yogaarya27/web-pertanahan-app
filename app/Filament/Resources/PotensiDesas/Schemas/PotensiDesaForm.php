<?php

namespace App\Filament\Resources\PotensiDesas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PotensiDesaForm
{
    public static function configure(Schema $schema): Schema
    {
return $schema
    ->components([

        TextInput::make('title')
            ->label('Judul Potensi')
            ->required()
            ->live(onBlur: true)
            ->afterStateUpdated(
                fn ($state, callable $set) =>
                    $set('slug', Str::slug($state))
            ),

        TextInput::make('slug')
            ->label('Slug')
            ->required()
            ->unique(ignoreRecord: true),

        FileUpload::make('image')
            ->label('Gambar Potensi')
            ->disk('public')
            ->image()
            ->imageEditor()
            ->required(),

        Textarea::make('description')
            ->label('Deskripsi')
            ->rows(5)
            ->required(),

    ]);
    }
}

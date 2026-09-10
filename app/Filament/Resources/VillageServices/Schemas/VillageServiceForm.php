<?php

namespace App\Filament\Resources\VillageServices\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class VillageServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Informasi Layanan')
                    ->schema([

                        TextInput::make('nama_layanan')
                            ->label('Nama Layanan')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, callable $set) {
                                $set('slug', Str::slug($state));
                            }),

                        TextInput::make('slug')
                            ->disabled()
                            ->dehydrated(),

                        TextInput::make('icon')
                            ->label('Icon')
                            ->placeholder('heroicon-o-document-text'),

                        TextInput::make('warna')
                            ->default('blue')
                            ->label('Warna'),

                        Textarea::make('deskripsi')
                            ->rows(4)
                            ->columnSpanFull(),

                    ])
                    ->columns(2),

                Section::make('Persyaratan dan Prosedur')
                    ->schema([

                        RichEditor::make('persyaratan')
                            ->label('Persyaratan')
                            ->columnSpanFull(),

                        RichEditor::make('prosedur')
                            ->label('Prosedur')
                            ->columnSpanFull(),

                    ]),

                Section::make('Informasi Tambahan')
                    ->schema([

                        TextInput::make('estimasi_waktu')
                            ->label('Estimasi Waktu')
                            ->placeholder('1 Hari Kerja'),

                        TextInput::make('biaya')
                            ->default('Gratis'),

                        Toggle::make('status')
                            ->default(true)
                            ->label('Aktif'),

                    ])
                    ->columns(3),

            ]);
    }
}
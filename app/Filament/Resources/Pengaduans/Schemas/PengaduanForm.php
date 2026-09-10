<?php

namespace App\Filament\Resources\Pengaduans\Schemas;

use App\Models\Pengaduan;
use Dom\Text;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Placeholder;
use Illuminate\Support\HtmlString;

class PengaduanForm
{

    protected static ?string $model = Pengaduan::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';
    protected static ?string $navigationGroup = 'Layanan Desa';
    protected static ?string $navigationLabel = 'Pengaduan Masyarakat';
    protected static ?string $modelLabel = 'Pengaduan';
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nomor_tiket')
                    ->label('Nomer Tiket')
                    ->disabled(),
                TextInput::make('nama_lengkap')
                    ->label('Nama Lengkap')
                    ->disabled(),
                TextInput::make('nik')
                    ->label('NIK')
                    ->disabled(),
                TextInput::make('email')
                    ->label('Email')
                    ->disabled(),
                TextInput::make('telepon')
                    ->label('Telepon')
                    ->disabled(),
                Select::make('kategori')
                    ->options([
                        'Infrastruktur Desa' => 'Infrastruktur Desa',
                        'Lingkungan Hidup' => 'Lingkungan Hidup',
                        'Masalah Sosial' => 'Masalah Sosial',
                        'Pendidikan Masyarakat' => 'Pendidikan Masyarakat',
                        'Keamanan Masyarakat' => 'Keamanan Masyarakat',
                        'Lainnya' => 'Lainnya',
                    ])
                    ->label('Kategori')
                    ->disabled(),
                Textarea::make('isi_pengaduan')
                    ->label('Isi Pengaduan')
                    ->disabled(),
Placeholder::make('lampiran_link')
    ->label('Lampiran')
    ->content(function ($record) {

        if (! $record->lampiran) {
            return 'Tidak ada lampiran';
        }

        return new HtmlString(
            '<a href="' . asset('storage/' . $record->lampiran) . '"
                target="_blank"
                style="
                    display:inline-flex;
                    align-items:center;
                    gap:8px;
                    padding:10px 18px;
                    background:#2563eb;
                    color:white;
                    border-radius:12px;
                    font-weight:600;
                    text-decoration:none;
                    box-shadow:0 4px 10px rgba(37,99,235,.25);
                ">
                👁️ Lihat File
            </a>'
        );
    }),
                Select::make('status')
                    ->label('Status Pengaduan')
                    ->options([
                        'Pending' => 'Pending',
                        'Diproses' => 'Diproses',
                        'Selesai' => 'Selesai',
                    ])
                    ->required()
                    ->native(false),


            ]);
    }
}

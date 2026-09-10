<?php

namespace App\Filament\Resources\Penduduks\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PendudukForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nik')
                    ->required(),
                TextInput::make('no_kk')
                    ->required(),
                TextInput::make('nama')
                    ->required(),
                Select::make('jenis_kelamin')
                    ->options(['Laki-laki' => 'Laki laki', 'Perempuan' => 'Perempuan'])
                    ->required(),
                TextInput::make('tempat_lahir')
                    ->default(null),
                DatePicker::make('tanggal_lahir')
                    ->required(),
                TextInput::make('dusun')
                    ->required(),
                TextInput::make('rt')
                    ->default(null),
                TextInput::make('rw')
                    ->default(null),
                Select::make('agama')
                    ->options([
            'Islam' => 'Islam',
            'Kristen' => 'Kristen',
            'Katolik' => 'Katolik',
            'Hindu' => 'Hindu',
            'Buddha' => 'Buddha',
            'Konghucu' => 'Konghucu',
        ])
                    ->default(null),
Select::make('pendidikan')
    ->options([
        'Tidak/Belum Sekolah' => 'Tidak/Belum Sekolah',
        'Belum Tamat SD/Sederajat' => 'Belum Tamat SD/Sederajat',
        'Tamat SD/Sederajat' => 'Tamat SD/Sederajat',
        'SLTP/Sederajat' => 'SLTP/Sederajat',
        'SLTA/Sederajat' => 'SLTA/Sederajat',
        'Diploma I' => 'Diploma I',
        'Diploma II' => 'Diploma II',
        'Diploma III' => 'Diploma III',
        'Diploma IV / Strata I' => 'Diploma IV / Strata I',
        'Strata II' => 'Strata II',
        'Strata III' => 'Strata III',
    ])
    ->searchable()
    ->preload(),
Select::make('pekerjaan')
    ->options([
        'Belum/Tidak Bekerja' => 'Belum/Tidak Bekerja',
        'Pelajar/Mahasiswa' => 'Pelajar/Mahasiswa',
        'Mengurus Rumah Tangga' => 'Mengurus Rumah Tangga',
        'Petani' => 'Petani',
        'Pekebun' => 'Pekebun',
        'Peternak' => 'Peternak',
        'Nelayan' => 'Nelayan',
        'Buruh Harian Lepas' => 'Buruh Harian Lepas',
        'Karyawan Swasta' => 'Karyawan Swasta',
        'Wiraswasta' => 'Wiraswasta',
        'Pedagang' => 'Pedagang',
        'Guru' => 'Guru',
        'Dosen' => 'Dosen',
        'Perangkat Desa' => 'Perangkat Desa',
        'PNS' => 'PNS',
        'TNI' => 'TNI',
        'POLRI' => 'POLRI',
        'Pensiunan' => 'Pensiunan',
        'Dokter' => 'Dokter',
        'Perawat' => 'Perawat',
        'Bidan' => 'Bidan',
        'Lainnya' => 'Lainnya',
    ])
    ->searchable()
    ->preload(),
                Select::make('status_perkawinan')
                    ->options([
            'Belum Kawin' => 'Belum kawin',
            'Kawin' => 'Kawin',
            'Cerai Hidup' => 'Cerai hidup',
            'Cerai Mati' => 'Cerai mati',
        ])
                    ->default(null),
                Select::make('status_penduduk')
                    ->options(['Aktif' => 'Aktif', 'Pindah' => 'Pindah', 'Meninggal' => 'Meninggal'])
                    ->default('Aktif')
                    ->required(),
            ]);
    }
}

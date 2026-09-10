<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $fillable = [
        'nik',
        'no_kk',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'dusun',
        'rt',
        'rw',
        'agama',
        'pendidikan',
        'pekerjaan',
        'status_perkawinan',
        'status_penduduk',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}
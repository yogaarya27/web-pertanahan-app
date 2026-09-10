<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TentangDesa extends Model
{
protected $fillable = [

    'populasi',
    'luas_wilayah',
    'jumlah_rumah_tangga',

    'jumlah_kk',
    'jumlah_dusun',

    'visi',
    'misi',

    'lokasi_desa',

    'sejarah_desa',
    'gambar_sejarah',

    'batas_utara',
    'batas_timur',
    'batas_selatan',
    'batas_barat',

];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataPertanahan extends Model
{
    use SoftDeletes;

    protected $table = 'data_pertanahan';

    protected $fillable = [
        'nama_perumahan',
        'peruntukan',
        'luas',
        'kelurahan',
        'kecamatan',
        'bukti_perolehan',
        'status_saat_ini',
        'penyerahan_ke_bagian_aset',
        'peta_bidang',
        'peta_spasial',
        'nomor_sertifikat',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

}

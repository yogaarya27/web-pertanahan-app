<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class VillageService extends Model
{
    protected $fillable = [
        'icon',
        'nama_layanan',
        'slug',
        'deskripsi',
        'persyaratan',
        'prosedur',
        'estimasi_waktu',
        'biaya',
        'warna',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->nama_layanan);
            }
        });
    }
}
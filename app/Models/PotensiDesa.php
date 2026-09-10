<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PotensiDesa extends Model
{
    protected $table = 'village_potentials';

    protected $fillable = [
        'title',
        'slug',
        'image',
        'description'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($potensi) {

            if (empty($potensi->slug)) {

                $potensi->slug = Str::slug($potensi->title);

            }

        });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceGuide extends Model
{
    protected $fillable = [
        'judul',
        'gambar',
        'status',
        'urutan',
    ];
}
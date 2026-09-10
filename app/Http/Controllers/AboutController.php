<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\PotensiDesa;
use App\Models\TentangDesa;

class AboutController extends Controller
{
    public function index()
    {
        $tentangDesa = TentangDesa::first();

        $potensiDesa = PotensiDesa::latest()->get();

        $banners = Banner::latest()->get();

        return view('pages.profil-desa', compact(
            'tentangDesa',
            'potensiDesa',
            'banners'
        ));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeBanner;
use App\Models\TentangDesa;
use App\Models\PotensiDesa;

class HomeController extends Controller
{
public function index()
{
    $banners = HomeBanner::where('is_active', true)
        ->orderBy('order', 'asc')
        ->get();

    $tentangDesa = TentangDesa::first();

    $potensiDesa = PotensiDesa::latest()->get();

    $latestPotensi = PotensiDesa::latest()->first(); // 👈 TAMBAHAN

    return view('pages.profil-desa', [
        'banners' => $banners,
        'tentangDesa' => $tentangDesa,
        'potensiDesa' => $potensiDesa,
        'latestPotensi' => $latestPotensi, // 👈 TAMBAHAN
    ]);
}
}
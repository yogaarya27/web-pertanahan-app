<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use App\Models\PotensiDesa;
use App\Models\TentangDesa;

class PotensiDesaController extends Controller
{
    public function index()
    {
        $tentangDesa = TentangDesa::first();

        $potensiDesa = PotensiDesa::latest()->get();

        $banners = HomeBanner::where('is_active', true)
            ->orderBy('order', 'asc')
            ->get();

        return view('pages.profil-desa', [
            'tentangDesa' => $tentangDesa,
            'potensiDesa' => $potensiDesa,
            'banners' => $banners,
        ]);
    }
public function latest()
{
    $potensi = PotensiDesa::latest()->first();

    if (!$potensi) {
        abort(404, 'Belum ada data potensi');
    }

    $potensiLainnya = PotensiDesa::where('id', '!=', $potensi->id)
        ->latest()
        ->take(5)
        ->get();

    return view('pages.potensi-detail', compact(
        'potensi',
        'potensiLainnya'
    ));
}
public function show($slug)
{
    $potensi = PotensiDesa::where('slug', $slug)
        ->firstOrFail();

    $potensiLainnya = PotensiDesa::where('id', '!=', $potensi->id)
        ->latest()
        ->take(5)
        ->get();

    return view('pages.potensi-detail', compact(
        'potensi',
        'potensiLainnya'
    ));
}
}
<?php

namespace App\Http\Controllers;

use App\Models\DokumenDesa;
use App\Models\VillageService;
use App\Models\ServiceGuide;

class DokumenDesaController extends Controller
{
    public function index()
    {
        $dokumen = DokumenDesa::latest()->get();

        $services = VillageService::where('status', true)
            ->orderBy('nama_layanan')
            ->get();

        $serviceGuide = ServiceGuide::latest()->first();

        return view('pages.layanan.layanan', compact(
            'dokumen',
            'services',
            'serviceGuide'
        ));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\DataPertanahan;

class DataPertanahanController extends Controller
{
    public function index()
    {
        // Statistik utama
        $totalPertanahan = DataPertanahan::count();

        // Status statistik
        $belumDiproses = DataPertanahan::where('status_saat_ini', 'belum diproses')->count();
        $prosesPensertifikatan = DataPertanahan::where('status_saat_ini', 'proses pensertifikatan')->count();
        $sertifikatTerbit = DataPertanahan::where('status_saat_ini', 'sertifikat terbit')->count();

        // Kelurahan
        $kelurahan = DataPertanahan::selectRaw('kelurahan, COUNT(*) as total')
            ->groupBy('kelurahan')
            ->orderByDesc('total')
            ->get();

        // Kecamatan
        $kecamatan = DataPertanahan::selectRaw('kecamatan, COUNT(*) as total')
            ->groupBy('kecamatan')
            ->orderByDesc('total')
            ->get();

        // Peruntukan
        $peruntukan = DataPertanahan::selectRaw('peruntukan, COUNT(*) as total')
            ->groupBy('peruntukan')
            ->orderByDesc('total')
            ->get();

        // Data pertanahan untuk tabel
        $dataPertanahan = DataPertanahan::paginate(15);

        return view('pages.data-pertanahan', compact(
            'totalPertanahan',
            'belumDiproses',
            'prosesPensertifikatan',
            'sertifikatTerbit',
            'kelurahan',
            'kecamatan',
            'peruntukan',
            'dataPertanahan'
        ));
    }
}

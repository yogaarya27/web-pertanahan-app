<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        $strukturOrganisasi = StrukturOrganisasi::where('is_active', true)
            ->orderBy('urutan', 'asc')
            ->get();

        return view('pages.struktur-organisasi', [
            'strukturOrganisasi' => $strukturOrganisasi
        ]);
    }
}
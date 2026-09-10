@extends('layouts.app')

@section('title', 'Struktur Organisasi')

@section('content')

<section class="py-16 bg-gray-100 min-h-screen overflow-hidden">

    <div class="container mx-auto px-4">

        <!-- TITLE -->
        <div class="text-center mb-16">

            <span class="px-5 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold">
                Bidang Pertanahan
            </span>

            <h1 class="text-4xl font-bold text-gray-800 mt-5">
                Struktur Organisasi
            </h1>

        </div>

        @php
            $kepalaDesa = $strukturOrganisasi->where('urutan', 1)->first();

            $staff = $strukturOrganisasi->where('urutan', '!=', 1);
        @endphp

        <!-- ========================= -->
        <!-- KEPALA DESA -->
        <!-- ========================= -->

        @if($kepalaDesa)

        <div class="flex flex-col items-center relative z-10">

            <!-- FOTO BULAT -->
            <div class="relative">

                <div class="w-32 h-32 rounded-full border-[4px] border-blue-500 overflow-hidden shadow-xl bg-white">

                    <img
                        src="{{ asset('storage/' . $kepalaDesa->foto) }}"
                        class="w-full h-full object-cover">

                </div>

            </div>

            <!-- CARD -->
            <div class="bg-white rounded-2xl shadow-lg px-6 py-4 text-center mt-4 min-w-[220px]">

                <h2 class="text-2xl font-bold text-blue-900 leading-tight">
                    {{ $kepalaDesa->nama }}
                </h2>

                <p class="text-gray-600 text-base mt-1">
                    {{ $kepalaDesa->jabatan }}
                </p>

            </div>

            <!-- GARIS -->
            <div class="w-1 h-12 bg-blue-400 mt-5 relative">

                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-4 h-4 rounded-full bg-blue-500 border-2 border-white shadow"></div>

            </div>

        </div>

        @endif

        <!-- ========================= -->
        <!-- STAFF -->
        <!-- ========================= -->

        @if($staff->count())

        <div class="max-w-5xl mx-auto relative">

            <!-- GARIS HORIZONTAL -->
            <div class="absolute top-0 left-[12%] right-[12%] h-1 bg-blue-400 rounded-full"></div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 pt-8">

                @foreach($staff as $item)

                <div class="flex flex-col items-center relative">

                    <!-- GARIS -->
                    <div class="absolute -top-8 w-1 h-8 bg-blue-400"></div>

                    <!-- BULAT -->
                    <div class="absolute -top-10 w-4 h-4 rounded-full bg-blue-500 border-2 border-white shadow"></div>

                    <!-- FOTO -->
                    <div class="w-24 h-24 rounded-full border-[4px] border-blue-500 overflow-hidden shadow-lg bg-white">

                        <img
                            src="{{ asset('storage/' . $item->foto) }}"
                            class="w-full h-full object-cover">

                    </div>

                    <!-- CARD -->
                    <div class="bg-white rounded-2xl shadow-md px-4 py-4 text-center mt-4 w-full">

                        <h3 class="text-lg font-bold text-blue-900 leading-tight">
                            {{ $item->nama }}
                        </h3>

                        <p class="text-gray-600 text-sm mt-1">
                            {{ $item->jabatan }}
                        </p>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

        @endif

    </div>

</section>

@endsection
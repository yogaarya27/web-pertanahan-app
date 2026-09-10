@extends('layouts.layanan')
@php
use Illuminate\Support\Str;
@endphp
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
@section('content')
<!-- Hero Section -->

<!-- Panduan Layanan -->
@if($serviceGuide)
<style>
.persyaratan-list ul,
.prosedur-list ul{
    list-style: none;
    padding-left: 0;
}

.persyaratan-list li{
    position: relative;
    padding-left: 30px;
    margin-bottom: 10px;
}

.persyaratan-list li::before{
    content: "✓";
    position: absolute;
    left: 0;
    top: 0;
    width: 22px;
    height: 22px;
    border-radius: 50%;
    background: #dcfce7;
    color: #15803d;
    font-weight: bold;
    text-align: center;
    line-height: 22px;
}

.prosedur-list ol{
    counter-reset: step;
    list-style: none;
    padding-left: 0;
}

.prosedur-list ol li{
    counter-increment: step;
    position: relative;
    padding-left: 45px;
    margin-bottom: 14px;
}

.prosedur-list ol li::before{
    content: counter(step);
    position: absolute;
    left: 0;
    top: 0;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background: #1e40af;
    color: white;
    font-weight: bold;
    text-align: center;
    line-height: 28px;

</style>
<section class="py-10 bg-gray-100">

    <div class="container mx-auto px-4">

<div
    class="relative rounded-3xl overflow-hidden shadow-xl group"
    data-aos="zoom-in"
    data-aos-duration="1500"
    data-aos-easing="ease-out-cubic">

    <img
        src="{{ asset('storage/' . $serviceGuide->gambar) }}"
        alt="{{ $serviceGuide->judul }}"
        class="w-full h-[280px] md:h-[400px] object-cover
        transition-all duration-1000 ease-out
        group-hover:scale-110">

    <div
        class="absolute inset-0
        bg-gradient-to-t from-black/80 via-black/20 to-transparent">
    </div>

    <div
        class="absolute bottom-0 left-0 p-6 md:p-10 text-white">

        <span
            class="bg-blue-600/90 backdrop-blur-md px-4 py-2 rounded-full
            text-xs font-semibold uppercase tracking-wide">

            Informasi Layanan

        </span>

        <h3 class="text-2xl md:text-4xl font-bold mt-4">

            {{ $serviceGuide->judul }}

        </h3>

        <p class="mt-3 text-gray-200 max-w-2xl">

            Panduan resmi pelayanan administrasi Desa Smart.

        </p>

    </div>

</div>

        </div>

    </div>

</section>

@endif
<!-- Layanan Desa -->
<section class="py-16 bg-white">

    <div class="max-w-7xl mx-auto px-4">

        <div class="text-center mb-14" data-aos="fade-up" data-aos-duration="1000">

            <h2 class="text-4xl font-bold mt-4 text-gray-800">
                Layanan Administrasi Desa
            </h2>

            <p class="text-gray-500 mt-3 max-w-2xl mx-auto">
                Pilih layanan yang dibutuhkan untuk melihat persyaratan,
                prosedur, estimasi waktu dan biaya pelayanan.
            </p>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($services as $service)

            
<div
    data-aos="zoom-in-up"
    data-aos-duration="1000"
    data-aos-delay="{{ $loop->iteration * 100 }}"
    class="bg-white rounded-3xl overflow-hidden border border-gray-200 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition duration-300">
                <!-- Header -->
                <div class="bg-gradient-to-r from-blue-700 to-indigo-800 p-6 text-white">

                    <div class="w-16 h-16 rounded-full bg-white/20 flex items-center justify-center mb-4">
                        <i data-feather="{{ $service->icon ?? 'file-text' }}" class="w-8 h-8"></i>
                    </div>

                    <h3 class="text-xl font-bold">
                        {{ $service->nama_layanan }}
                    </h3>

                </div>

                <!-- Body -->
                <div class="p-6">

                    <p class="text-gray-600 leading-relaxed mb-5">
                        {{ Str::limit(strip_tags($service->deskripsi), 120) }}
                    </p>

                    <div class="bg-gray-50 rounded-xl p-4 mb-5">

                        <div class="flex items-center text-sm text-gray-700 mb-2">
                            <i data-feather="clock" class="w-4 h-4 mr-2"></i>
                            <strong>Estimasi :</strong>&nbsp;
                            {{ $service->estimasi_waktu ?? 'Menyesuaikan' }}
                        </div>

                        <div class="flex items-center text-sm text-gray-700">
                            <i data-feather="credit-card" class="w-4 h-4 mr-2"></i>
                            <strong>Biaya :</strong>&nbsp;
                            {{ $service->biaya }}
                        </div>

                    </div>

                    <button
                        onclick="document.getElementById('layanan-{{ $service->id }}').classList.toggle('hidden')"
                        class="w-full bg-blue-700 hover:bg-blue-800 text-white font-semibold py-3 rounded-xl transition">

                        Lihat Persyaratan & Prosedur

                    </button>

                </div>

                <!-- Detail -->
                <div id="layanan-{{ $service->id }}"
                    class="hidden border-t bg-gray-50 p-6">

                    <!-- Persyaratan -->
                    <div class="mb-8">

                        <h4 class="font-bold text-lg text-blue-800 mb-4">
                            📋 Persyaratan
                        </h4>

                        <div class="bg-white rounded-xl border p-4">

                            {!! str_replace(
                                ['<ul>', '</ul>'],
                                ['<ul class="space-y-3">', '</ul>'],
                                $service->persyaratan
                            ) !!}

                        </div>

                    </div>

                    <!-- Prosedur -->
                    <div>

                        <h4 class="font-bold text-lg text-blue-800 mb-4">
                            🔄 Prosedur
                        </h4>

                        <div class="bg-white rounded-xl border p-4">

                            {!! str_replace(
                                ['<ol>', '</ol>'],
                                ['<ol class="list-decimal pl-5 space-y-3">', '</ol>'],
                                $service->prosedur
                            ) !!}

                        </div>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
AOS.init({
    once: true,
    duration: 1000,
    easing: 'ease-in-out'
});
</script>
@endsection
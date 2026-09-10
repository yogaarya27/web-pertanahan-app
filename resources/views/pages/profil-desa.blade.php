@extends('layouts.app')
<style>
html {
    scroll-behavior: smooth;
}

[data-aos] {
    will-change: transform, opacity;
}
</style>
@section('title', 'Bidang Pertanahan')

@section('content')

<!-- =========================
BANNER SLIDER 
========================= -->
<section
    class="relative w-full h-[650px] overflow-hidden bg-gray-900"
x-data="{
    currentSlide: 0,
    totalSlides: {{ $banners->count() }},
    autoSlide: null,

    init() {

        if (this.totalSlides > 1) {

            this.startSlide();

        }

    },

    startSlide() {

        this.autoSlide = setInterval(() => {

            this.nextSlide();

        }, 5000);

    },

    nextSlide() {

        this.currentSlide =
            (this.currentSlide + 1) % this.totalSlides;

    },

    prevSlide() {

        this.currentSlide =
            (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;

    },

    goToSlide(index) {

        this.currentSlide = index;

    }
}"
    x-init="init">

    @if ($banners->isNotEmpty())

    <div class="relative w-full h-full">

        @foreach ($banners as $index => $banner)

        <div
            class="absolute inset-0 transition-all duration-700 ease-in-out"
            :class="{
    'opacity-100 z-10 scale-100': {{ $index }} === currentSlide,
    'opacity-0 invisible z-0 scale-105': {{ $index }} !== currentSlide
}">

            <img
                src="{{ asset('storage/' . $banner->image) }}"
                alt="{{ $banner->title }}"
                class="w-full h-full object-cover">

            <!-- Overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/50 to-black/40"></div>

            <!-- Content -->
            <div class="absolute inset-0 flex items-center">

                <div class="container mx-auto px-6">

                    <div class="max-w-3xl">

                        <span class="inline-block px-5 py-2 bg-blue-600/80 text-white rounded-full backdrop-blur-md mb-6 text-sm md:text-base">
                            Bidang Pertanahan DPKP Kota Salatiga
                        </span>

                        <h1 class="text-5xl md:text-7xl font-black leading-tigh text-white leading-tight mb-6 drop-shadow-2xl">
                            {{ $banner->title }}
                        </h1>

                        <p class="text-lg md:text-xl text-gray-200 leading-relaxed mb-8">
                            {{ $tentangDesa->visi ?? 'Membangun desa yang maju, mandiri, dan sejahtera.' }}
                        </p>

                        <div class="flex flex-wrap gap-4">



                        </div>

                    </div>

                </div>

            </div>

        </div>

        @endforeach

    </div>

    <!-- BUTTON -->
    @if ($banners->count() > 1)

    <button
        @click="prevSlide()"
        class="absolute left-5 top-1/2 -translate-y-1/2 z-20 w-14 h-14 rounded-full bg-white/20 hover:bg-white/40 backdrop-blur-md text-white flex items-center justify-center transition">

        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">

            <path stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" d="M15 19l-7-7 7-7" />

        </svg>

    </button>

    <button
        @click="nextSlide()"
        class="absolute right-5 top-1/2 -translate-y-1/2 z-20 w-14 h-14 rounded-full bg-white/20 hover:bg-white/40 backdrop-blur-md text-white flex items-center justify-center transition">

        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">

            <path stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" d="M9 5l7 7-7 7" />

        </svg>

    </button>

    <!-- DOT -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-3 z-20">

        @foreach ($banners as $index => $banner)

        <button
            @click="goToSlide({{ $index }})"
            class="transition-all duration-300 rounded-full"
            :class="{
                'w-10 h-3 bg-white': {{ $index }} === currentSlide,
                'w-3 h-3 bg-white/50 hover:bg-white': {{ $index }} !== currentSlide
            }">
        </button>

        @endforeach

    </div>

    @endif

    @endif

</section>

<!-- =========================
STATISTIK PREMIUM
========================= -->
<section class="relative -mt-24 z-40">

    <div class="container mx-90 px-4">

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">

            <!-- Penduduk -->
            <div data-aos="zoom-in" data-aos-delay="100" class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-blue-600 via-blue-500 to-cyan-400 p-[1px] hover:-translate-y-2 hover:scale-105 transition-all duration-500">

                <div class="relative bg-white/95 backdrop-blur-xl rounded-3xl p-6 h-full">

                    <div class="absolute top-0 left-0 w-full h-full bg-grid-white/[0.03]"></div>

                    <div class="relative z-10">

                        <div class="flex items-center justify-between">

                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">
                                    Jumlah Perumahan di Salatiga
                                </p>

                                <h3 class="text-4xl font-black text-slate-900 mt-3">
                                    {{ number_format($tentangDesa->populasi ?? 0) }}
                                </h3>
                            </div>

                            <div class="w-20 h-20 rounded-3xl bg-blue-100 shadow-xl ring-4 ring-blue-100 flex items-center justify-center group-hover:rotate-12 group-hover:ring-blue-300 transition-all duration-500">
                                <span class="text-5xl">🏠</span>
                            </div>

                        </div>

                        <div class="mt-6 h-2 bg-blue-100 rounded-full overflow-hidden">
                            <div class="h-full w-full bg-gradient-to-r from-blue-600 to-cyan-500 rounded-full"></div>
                        </div>

                    </div>

                </div>

            </div>

            <!-- KK -->
            <div data-aos="zoom-in" data-aos-delay="100" class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-green-600 via-green-500 to-emerald-400 p-[1px] hover:-translate-y-2 hover:scale-105 transition-all duration-500">

                <div class="relative bg-white/95 backdrop-blur-xl rounded-3xl p-6 h-full">

                    <div class="absolute top-0 right-0 w-24 h-24 bg-green-400/20 blur-3xl rounded-full"></div>

                    <div class="relative z-10">

                        <div class="flex items-center justify-between">

                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">
                                    Jumlah PSU yang dikelola DPKP
                                </p>

                                <h3 class="text-4xl font-black text-slate-900 mt-3">
                                    {{ number_format($tentangDesa->jumlah_kk ?? 0) }}
                                </h3>
                            </div>

                            <div class="w-20 h-20 rounded-3xl bg-green-100 shadow-xl ring-4 ring-green-100 flex items-center justify-center group-hover:rotate-12 group-hover:ring-green-300 transition-all duration-500">
                                <span class="text-5xl">🏠</span>
                            </div>

                        </div>

                        <div class="mt-6 h-2 bg-green-100 rounded-full overflow-hidden">
                            <div class="h-full w-full bg-gradient-to-r from-green-600 to-emerald-500 rounded-full"></div>
                        </div>

                    </div>

                </div>

            </div>

            <!-- Dusun -->
            <div data-aos="zoom-in" data-aos-delay="100" class="group relative overflow-hiddenn rounded-3xl bg-gradient-to-br from-purple-600 via-purple-500 to-fuchsia-400 p-[1px] hover:-translate-y-2 hover:scale-105 transition-all duration-500">

                <div class="relative bg-white/95 backdrop-blur-xl rounded-3xl p-6 h-full">

                    <div class="absolute top-0 right-0 w-24 h-24 bg-purple-400/20 blur-3xl rounded-full"></div>

                    <div class="relative z-10">

                        <div class="flex items-center justify-between">

                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">
                                    Jumlah Kecamatan
                                </p>

                                <h3 class="text-4xl font-black text-slate-900 mt-3">
                                    {{ number_format($tentangDesa->jumlah_dusun ?? 0) }}
                                </h3>
                            </div>

                            <div class="w-20 h-20 rounded-3xl bg-purple-100 shadow-xl ring-4 ring-purple-100 flex items-center justify-center group-hover:rotate-12 group-hover:ring-purple-300 transition-all duration-500">
                                <span class="text-5xl">🏘️</span>
                            </div>

                        </div>

                        <div class="mt-6 h-2 bg-purple-100 rounded-full overflow-hidden">
                            <div class="h-full w-full bg-gradient-to-r from-purple-600 to-fuchsia-500 rounded-full"></div>
                        </div>

                    </div>

                </div>

            </div>

            <!-- Luas Wilayah -->
            <div data-aos="zoom-in" data-aos-delay="100" class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-orange-600 via-orange-500 to-red-400 p-[1px] hover:-translate-y-2 hover:scale-105 transition-all duration-500">

                <div class="relative bg-white/95 backdrop-blur-xl rounded-3xl p-6 h-full">

                    <div class="absolute top-0 right-0 w-24 h-24 bg-orange-400/20 blur-3xl rounded-full"></div>

                    <div class="relative z-10">

                        <div class="flex items-center justify-between">

                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">
                                    Jumlah Kelurahan
                                </p>

                                <h3 class="text-3xl font-black text-slate-900 mt-3">
                                    {{ $tentangDesa->luas_wilayah ?? '-' }}
                                </h3>
                            </div>

                            <div class="w-20 h-20 rounded-3xl bg-orange-100 shadow-xl ring-4 ring-orange-100 flex items-center justify-center group-hover:rotate-12 group-hover:ring-orange-300 transition-all duration-500">
                                <span class="text-5xl">🏠</span>
                            </div>

                        </div>

                        <div class="mt-6 h-2 bg-orange-100 rounded-full overflow-hidden">
                            <div class="h-full w-full bg-gradient-to-r from-orange-600 to-red-500 rounded-full"></div>
                        </div>

                    </div>

                </div>

            </div>

            
</section>

<!-- =========================
LOKASI DESA
========================= -->
<section id="lokasi-desa" class="pb-24 bg-white">

    <div class="container mx-auto px-4">

        <div
    data-aos="fade-up"
    class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">

            <div class="p-10 text-center border-b border-gray-100">

                <span class="inline-block px-5 py-2 bg-red-100 text-red-600 rounded-full mb-5">
                    Lokasi 
                </span>

                <h2 class="text-4xl font-bold text-gray-800 mb-4">
                    Lokasi Dinas Perumahan dan Kawasan Permukiman Kota Salatiga
                </h2>

                <p class="text-gray-600 max-w-2xl mx-auto">
                    Temukan lokasi  melalui peta interaktif berikut.
                </p>

            </div>

            <div class="w-full h-[600px] [&>iframe]:w-full [&>iframe]:h-full [&>iframe]:border-0">
                {!! $tentangDesa->lokasi_desa ?? '' !!}
            </div>

        </div>

    </div>

</section>

@endsection
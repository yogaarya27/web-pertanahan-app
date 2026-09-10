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

                            <a href="#profil-desa"
                                class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl font-semibold transition duration-300 shadow-xl">
                                Lihat Profil Desa
                            </a>

                            <a href="#lokasi-desa"
                                class="px-8 py-4 bg-white/20 hover:bg-white/30 backdrop-blur-md text-white rounded-2xl font-semibold transition duration-300 border border-white/30">
                                Lokasi Desa
                            </a>

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

    <div class="container mx-auto px-4">

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">

            <!-- Penduduk -->
            <div data-aos="zoom-in" data-aos-delay="100" class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-blue-600 via-blue-500 to-cyan-400 p-[1px] hover:-translate-y-2 hover:scale-105 transition-all duration-500">

                <div class="relative bg-white/95 backdrop-blur-xl rounded-3xl p-6 h-full">

                    <div class="absolute top-0 left-0 w-full h-full bg-grid-white/[0.03]"></div>

                    <div class="relative z-10">

                        <div class="flex items-center justify-between">

                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">
                                    Jumlah Penduduk
                                </p>

                                <h3 class="text-4xl font-black text-slate-900 mt-3">
                                    {{ number_format($tentangDesa->populasi ?? 0) }}
                                </h3>
                            </div>

                            <div class="w-20 h-20 rounded-3xl bg-blue-100 shadow-xl ring-4 ring-blue-100 flex items-center justify-center group-hover:rotate-12 group-hover:ring-blue-300 transition-all duration-500">
                                <span class="text-5xl">👨‍👩‍👧‍👦</span>
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
                                    Jumlah KK
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
                                    Jumlah Dusun
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
                                    Luas Wilayah
                                </p>

                                <h3 class="text-3xl font-black text-slate-900 mt-3">
                                    {{ $tentangDesa->luas_wilayah ?? '-' }}
                                </h3>
                            </div>

                            <div class="w-20 h-20 rounded-3xl bg-orange-100 shadow-xl ring-4 ring-orange-100 flex items-center justify-center group-hover:rotate-12 group-hover:ring-orange-300 transition-all duration-500">
                                <span class="text-5xl">📍</span>
                            </div>

                        </div>

                        <div class="mt-6 h-2 bg-orange-100 rounded-full overflow-hidden">
                            <div class="h-full w-full bg-gradient-to-r from-orange-600 to-red-500 rounded-full"></div>
                        </div>

                    </div>

                </div>

            </div>

            <!-- Rumah Tangga -->
            <div data-aos="zoom-in" data-aos-delay="100" class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-pink-600 via-pink-500 to-rose-400 p-[1px] hover:-translate-y-2 hover:scale-105 transition-all duration-500">

                <div class="relative bg-white/95 backdrop-blur-xl rounded-3xl p-6 h-full">

                    <div class="absolute top-0 right-0 w-24 h-24 bg-pink-400/20 blur-3xl rounded-full"></div>

                    <div class="relative z-10">

                        <div class="flex items-center justify-between">

                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">
                                    Rumah Tangga
                                </p>

                                <h3 class="text-4xl font-black text-slate-900 mt-3">
                                    {{ number_format($tentangDesa->jumlah_rumah_tangga ?? 0) }}
                                </h3>
                            </div>

                            <div class="w-20 h-20 rounded-3xl bg-pink-100 shadow-xl ring-4 ring-pink-100 flex items-center justify-center group-hover:rotate-12 group-hover:ring-pink-300 transition-all duration-500">
                                <span class="text-5xl">🏡</span>
                            </div>

                        </div>

                        <div class="mt-6 h-2 bg-pink-100 rounded-full overflow-hidden">
                            <div class="h-full w-full bg-gradient-to-r from-pink-600 to-rose-500 rounded-full"></div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- =========================
POTENSI DESA PREMIUM
========================= -->
<section class="py-24 bg-gradient-to-b from-white to-gray-50">

    <div class="container mx-auto px-4">

        <!-- Heading -->
        <div
            data-aos="fade-up"
            data-aos-duration="1000"
            class="text-center mb-16">

            <span class="px-5 py-2 bg-green-100 text-green-700 rounded-full font-medium">
                Potensi Desa
            </span>

            <h2 class="text-4xl md:text-5xl font-black text-slate-900 mt-5">
                Potensi Unggulan Desa
            </h2>

            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">
                Beragam potensi unggulan yang menjadi kekuatan dan sumber
                pengembangan ekonomi Desa Smart.
            </p>

        </div>

        {{-- CEK MORE --}}
        @php
            $showMore = $potensiDesa->count() > 4;
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            @foreach ($potensiDesa->take(4) as $index => $item)

            <a href="{{ route('potensi.show', $item->slug) }}"
                data-aos="zoom-in-up"
                data-aos-delay="{{ $index * 150 }}"
                data-aos-duration="800"
                class="group relative overflow-hidden rounded-3xl bg-white shadow-xl border border-gray-100 hover:-translate-y-3 hover:shadow-[0_25px_60px_-15px_rgba(37,99,235,0.35)] transition-all duration-500">

                <!-- Glow -->
                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-700">
                    <div class="absolute -top-20 -right-20 w-40 h-40 bg-blue-400/20 blur-3xl rounded-full"></div>
                </div>

                <!-- Image -->
                <div class="overflow-hidden">

                    <img
                        src="{{ asset('storage/' . $item->image) }}"
                        alt="{{ $item->title }}"
                        class="w-full h-60 object-cover group-hover:scale-110 transition duration-700">

                </div>

                <!-- Content -->
                <div class="p-6 relative z-10">

                    <h3 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition">
                        {{ $item->title }}
                    </h3>

                    <p class="text-gray-600 leading-relaxed text-sm">
                        {{ Str::limit(strip_tags($item->description), 100) }}
                    </p>

                    <div class="mt-6 flex items-center text-blue-600 font-semibold">

                        Baca Selengkapnya

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 ml-2 group-hover:translate-x-2 transition duration-300"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M9 5l7 7-7 7" />

                        </svg>

                    </div>

                </div>

            </a>

            @endforeach

        </div>

        {{-- BUTTON LIHAT SEMUA --}}
        @if($showMore)

        <div class="text-center mt-14" data-aos="zoom-in" data-aos-duration="800">

           <a href="{{ route('potensi.latest') }}"
   class="inline-flex items-center px-8 py-4 bg-blue-600 text-white font-semibold rounded-full
          shadow-lg hover:bg-blue-700 hover:shadow-2xl hover:-translate-y-1
          transition-all duration-500">

    Lihat Semua Potensi

    <svg xmlns="http://www.w3.org/2000/svg"
        class="w-5 h-5 ml-2"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M9 5l7 7-7 7" />

    </svg>

</a>

        </div>

        @endif

    </div>

</section>
<!-- =========================
TENTANG DESA PREMIUM MODERN
========================= -->
<section id="profil-desa" class="py-24 bg-gradient-to-b from-slate-50 via-white to-slate-50 overflow-hidden">

    <div class="container mx-auto px-4">

        <!-- HEADING -->
        <div
            data-aos="fade-up"
            data-aos-duration="1000"
            class="text-center mb-20">

            <span
                class="inline-flex items-center px-5 py-2 rounded-full
                bg-blue-50 border border-blue-100 text-blue-700 font-semibold">

                <span class="w-2 h-2 bg-blue-600 rounded-full mr-2"></span>
                Profil Desa

            </span>

            <h2 class="mt-6 text-5xl md:text-6xl font-black text-slate-900">

                Tentang Desa Smart

            </h2>

            <div
                class="w-32 h-1 bg-gradient-to-r from-blue-600 to-cyan-400 rounded-full mx-auto mt-6">
            </div>

            <p class="text-gray-500 max-w-3xl mx-auto mt-6 text-lg">

                Mengenal sejarah, visi pembangunan, misi desa serta batas wilayah
                Desa Smart sebagai desa yang maju, mandiri, modern dan berdaya saing.

            </p>

        </div>

        <div class="grid lg:grid-cols-12 gap-12 items-start">

            <!-- KONTEN KIRI -->
            <div
                data-aos="fade-right"
                data-aos-duration="1200"
                class="lg:col-span-7 space-y-8">

                <!-- SEJARAH DESA -->
                <div
                    class="relative bg-white rounded-[35px]
                    shadow-[0_25px_70px_-15px_rgba(0,0,0,0.08)]
                    border border-gray-100 overflow-hidden">

                    <div
                        class="absolute top-0 left-0 w-2 h-full
                        bg-gradient-to-b from-blue-600 to-cyan-400">
                    </div>

                    <div class="p-10">

                        <div class="flex items-center gap-5 mb-8">

                            <div
                                class="w-16 h-16 rounded-3xl
                                bg-gradient-to-br from-yellow-400 to-orange-500
                                shadow-xl flex items-center justify-center text-3xl">

                                📜

                            </div>

                            <div>

                                <h3 class="text-3xl font-black text-slate-900">

                                    Sejarah Desa

                                </h3>

                                <p class="text-gray-500">

                                    Perjalanan dan perkembangan desa

                                </p>

                            </div>

                        </div>

                        <div
                            class="text-gray-600 leading-loose text-lg text-justify">

                            {{ $tentangDesa->sejarah_desa ?? '-' }}

                        </div>

                    </div>

                </div>

                <!-- VISI MISI -->
                <div class="grid md:grid-cols-2 gap-8">

                    <!-- VISI -->
                    <div
                        class="rounded-[35px] overflow-hidden
                        bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800
                        text-white shadow-2xl">

                        <div class="p-8">

                            <div class="text-5xl mb-6">
                                💡
                            </div>

                            <h3 class="text-3xl font-black mb-5">

                                Visi Desa

                            </h3>

                            <p class="leading-relaxed text-white/90">

                                {{ $tentangDesa->visi ?? '-' }}

                            </p>

                        </div>

                    </div>

                    <!-- MISI -->
                    <div
                        class="rounded-[35px] overflow-hidden
                        bg-gradient-to-br from-emerald-500 via-green-600 to-green-800
                        text-white shadow-2xl">

                        <div class="p-8">

                            <div class="text-5xl mb-6">
                                🎯
                            </div>

                            <h3 class="text-3xl font-black mb-5">

                                Misi Desa

                            </h3>

                            <div class="leading-relaxed whitespace-pre-line text-white/90">

                                {{ $tentangDesa->misi ?? '-' }}

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- KONTEN KANAN -->
            <div
                data-aos="fade-left"
                data-aos-duration="1200"
                class="lg:col-span-5">

                <!-- FOTO DESA -->
                <div class="relative mb-12">

                    <div
                        class="overflow-hidden rounded-[35px]
                        shadow-[0_30px_80px_-15px_rgba(37,99,235,0.30)]">

                        <img
                            src="{{ $tentangDesa->gambar_sejarah ? asset('storage/' . $tentangDesa->gambar_sejarah) : 'https://placehold.co/800x600' }}"
                            alt="Desa Smart"
                            class="w-full h-[550px] object-cover hover:scale-110 transition duration-700">

                    </div>

                    <!-- Overlay -->
                    <div
                        class="absolute inset-0 rounded-[35px]
                        bg-gradient-to-t from-black/70 via-transparent to-transparent">
                    </div>

                    <!-- Text -->
                    <div
                        class="absolute bottom-8 left-8 text-white">

                        <span
                            class="bg-white/20 backdrop-blur-md
                            px-4 py-2 rounded-full text-sm">

                            Desa Smart

                        </span>

                        <h3 class="text-4xl font-black mt-4">

                            Desa Maju & Digital

                        </h3>

                        <p class="text-white/80 mt-2">

                            Pelayanan Cepat, Transparan dan Modern

                        </p>

                    </div>

                    <!-- Floating Card -->


                </div>

                <!-- BATAS WILAYAH -->
                <div
                    class="bg-white rounded-[35px]
                    shadow-[0_25px_70px_-15px_rgba(0,0,0,0.08)]
                    border border-gray-100 p-10 mt-14">

                    <div class="text-center mb-10">


                        <h3 class="text-3xl font-black mt-5 text-slate-900">

                            Batas Wilayah

                        </h3>

                    </div>

                    <div class="grid grid-cols-2 gap-5">

                        <div
                            class="bg-blue-50 rounded-3xl p-5 hover:scale-105 transition">

                            <h4 class="font-bold text-blue-800 mb-2">
                                ⬆ Utara
                            </h4>

                            <p class="text-gray-600">
                                {{ $tentangDesa->batas_utara ?? '-' }}
                            </p>

                        </div>

                        <div
                            class="bg-green-50 rounded-3xl p-5 hover:scale-105 transition">

                            <h4 class="font-bold text-green-700 mb-2">
                                ➡ Timur
                            </h4>

                            <p class="text-gray-600">
                                {{ $tentangDesa->batas_timur ?? '-' }}
                            </p>

                        </div>

                        <div
                            class="bg-orange-50 rounded-3xl p-5 hover:scale-105 transition">

                            <h4 class="font-bold text-orange-700 mb-2">
                                ⬇ Selatan
                            </h4>

                            <p class="text-gray-600">
                                {{ $tentangDesa->batas_selatan ?? '-' }}
                            </p>

                        </div>

                        <div
                            class="bg-purple-50 rounded-3xl p-5 hover:scale-105 transition">

                            <h4 class="font-bold text-purple-700 mb-2">
                                ⬅ Barat
                            </h4>

                            <p class="text-gray-600">
                                {{ $tentangDesa->batas_barat ?? '-' }}
                            </p>

                        </div>

                    </div>

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
                    Lokasi Desa
                </span>

                <h2 class="text-4xl font-bold text-gray-800 mb-4">
                    Lokasi Desa Smart
                </h2>

                <p class="text-gray-600 max-w-2xl mx-auto">
                    Temukan lokasi Desa Smart melalui peta interaktif berikut.
                </p>

            </div>

            <div class="w-full h-[600px] [&>iframe]:w-full [&>iframe]:h-full [&>iframe]:border-0">
                {!! $tentangDesa->lokasi_desa ?? '' !!}
            </div>

        </div>

    </div>

</section>

@endsection
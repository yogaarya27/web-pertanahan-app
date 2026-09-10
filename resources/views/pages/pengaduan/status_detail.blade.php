{{-- resources/views/pengaduan/status_detail.blade.php --}}

@extends('layouts.app')

@section('title', 'Status Pengaduan: ' . $pengaduan->nomor_tiket)

@section('content')
    <section class="mt-1">
<style>
@keyframes floatingGlow {
    0% {
        transform: translate(0,0);
    }
    50% {
        transform: translate(30px,-20px);
    }
    100% {
        transform: translate(0,0);
    }
}

.glow-1{
    animation: floatingGlow 8s ease-in-out infinite;
}

.glow-2{
    animation: floatingGlow 12s ease-in-out infinite reverse;
}
</style>

<div id="heroPengaduan"
    class="relative overflow-hidden bg-gradient-to-br from-blue-950 via-blue-900 to-indigo-900 text-white">

    <!-- Glow Background -->
    <div class="absolute inset-0 opacity-20">
        <div class="glow-1 absolute top-0 left-0 w-72 h-72 bg-blue-400 rounded-full blur-3xl"></div>
        <div class="glow-2 absolute bottom-0 right-0 w-96 h-96 bg-indigo-500 rounded-full blur-3xl"></div>
    </div>

    <!-- Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0"
            style="background-image: radial-gradient(circle, white 1px, transparent 1px);
            background-size: 30px 30px;">
        </div>
    </div>

    <div class="relative container mx-auto px-4 py-20">

        <div id="heroContent"
            class="max-w-4xl mx-auto text-center transition-all duration-500">

            <div
                class="inline-flex items-center px-5 py-2 rounded-full bg-white/10 backdrop-blur-md border border-white/20 mb-6">

                <i data-feather="shield" class="w-4 h-4 mr-2 text-yellow-300"></i>

                Status Pengaduan Masyarakat

            </div>

            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6">

                Detail Status

                <span class="block text-blue-300">
                    Pengaduan Anda
                </span>

            </h1>

            <p class="text-lg md:text-xl text-blue-100 max-w-3xl mx-auto leading-relaxed">

                Pantau perkembangan dan tindak lanjut pengaduan yang telah Anda sampaikan kepada Pemerintah Desa Smart.

            </p>

            <div class="grid grid-cols-3 gap-4 mt-10 max-w-2xl mx-auto">

                <div
                    class="bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/10 hover:scale-105 transition-all duration-500">

                    <div class="text-2xl font-bold">
                        {{ $pengaduan->nomor_tiket }}
                    </div>

                    <div class="text-sm text-blue-100">
                        Nomor Tiket
                    </div>

                </div>

                <div
                    class="bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/10 hover:scale-105 transition-all duration-500">

                    <div class="text-2xl font-bold">
                        {{ $pengaduan->status }}
                    </div>

                    <div class="text-sm text-blue-100">
                        Status
                    </div>

                </div>

                <div
                    class="bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/10 hover:scale-105 transition-all duration-500">

                    <div class="text-2xl font-bold">
                        {{ $pengaduan->updated_at->format('d M') }}
                    </div>

                    <div class="text-sm text-blue-100">
                        Update Terakhir
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Wave -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
        <svg viewBox="0 0 1200 120"
            preserveAspectRatio="none"
            class="relative block w-full h-14">

            <path
                d="M0,0V46.29c47.79,22,103.59,32.17,158,28,
                70.36-5.37,136.33-33.31,206.8-37.5,
                73.84-4.36,147.54,16.88,218.2,35.4,
                69.27,18.2,138.3,24.88,209.4,13.08,
                36.15-6,69.85-17.84,104.45-29.34,
                47.48-15.77,94.16-31.14,143.95-28,
                29.11,1.79,57.29,10.08,83.19,22.77V0Z"
                fill="#ffffff">
            </path>

        </svg>
    </div>

</div>

        <main class="container mx-auto px-4 py-12">
            @include('partials.flash-message') {{-- Pastikan Anda memiliki partial untuk menampilkan session message (jika ada) --}}

            <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-8 border border-blue-100">
                <h2 class="text-3xl font-bold text-blue-900 mb-6">
                    Kode Pengaduan: <span class="text-green-600">{{ $pengaduan->nomor_tiket }}</span>
                </h2>

                {{-- Display Status --}}
                <div
                    class="mb-8 p-4 rounded-lg
                @if ($pengaduan->status == 'Selesai') bg-green-100 border-l-4 border-green-500
                @elseif ($pengaduan->status == 'Diproses') bg-yellow-100 border-l-4 border-yellow-500
                @else bg-gray-100 border-l-4 border-gray-500 @endif
            ">
                    <h3 class="text-xl font-semibold mb-1">Status Saat Ini:</h3>
                    <p
                        class="text-2xl font-bold
                    @if ($pengaduan->status == 'Selesai') text-green-700
                    @elseif ($pengaduan->status == 'Diproses') text-yellow-700
                    @else text-gray-700 @endif
                ">
                        {{ $pengaduan->status }}
                    </p>
                    <p class="text-sm mt-2 text-gray-600">Terakhir diperbarui:
                        {{ $pengaduan->updated_at->format('d M Y H:i') }}</p>
                </div>

                {{-- Detail Pengaduan --}}
                <div class="space-y-4 text-gray-700">
                    <div class="border-b pb-3">
                        <p class="font-medium text-blue-900">Nama Pelapor:</p>
                        <p class="ml-4">{{ $pengaduan->nama_lengkap }} (NIK: {{ $pengaduan->nik }})</p>
                    </div>
                    <div class="border-b pb-3">
                        <p class="font-medium text-blue-900">Kategori:</p>
                        <p class="ml-4">{{ $pengaduan->kategori }}</p>
                    </div>
                    <div class="border-b pb-3">
                        <p class="font-medium text-blue-900">Isi Pengaduan:</p>
                        <p class="ml-4 whitespace-pre-wrap">{{ $pengaduan->isi_pengaduan }}</p>
                    </div>
                    @if ($pengaduan->lampiran)
                        <div class="border-b pb-3">
                            <p class="font-medium text-blue-900">Lampiran:</p>
                            <a href="{{ asset('storage/' . $pengaduan->lampiran) }}" target="_blank"
                                class="ml-4 text-blue-600 hover:underline">Lihat Dokumen/Foto</a>
                        </div>
                    @endif

                    {{-- Kolom Tindak Lanjut/Respon Admin --}}
                    @if ($pengaduan->respon)
                        <div class="pt-6 border-t border-gray-300">
                            <h3 class="text-xl font-bold text-green-700 mb-2 flex items-center">
                                <i data-feather="message-circle" class="mr-2 w-5 h-5"></i> Respon & Tindak Lanjut
                            </h3>
                            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                                <p class="whitespace-pre-wrap">{{ $pengaduan->respon }}</p>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="mt-8 text-center">
                    <a href="{{ url('/pengaduan') }}"
                        class="inline-flex items-center bg-blue-900 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-800 transition duration-150">
                        &larr; Kembali ke Halaman Utama Pengaduan
                    </a>
                </div>
            </div>
        </main>
    </section>

    <script>
        // Inisialisasi Feather Icons jika digunakan di status_detail view
document.addEventListener('DOMContentLoaded', function() {
    feather.replace();
});
        window.addEventListener('scroll', function() {

    const hero = document.getElementById('heroPengaduan');
    const content = document.getElementById('heroContent');

    if (!hero || !content) return;

    const scrollY = window.scrollY;

    const scale = 1 + (scrollY * 0.0004);
    const translateY = scrollY * 0.35;
    const opacity = Math.max(1 - scrollY / 500, 0);

    hero.style.transform = `scale(${scale})`;
    content.style.transform = `translateY(${translateY}px)`;
    content.style.opacity = opacity;

});
    </script>
@endsection

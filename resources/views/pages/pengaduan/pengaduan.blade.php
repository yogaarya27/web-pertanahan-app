@extends('layouts.app')

@section('title', 'Layanan Pengaduan Masyarakat')

@section('content')
    {{-- Hero & Form Content sama seperti sebelumnya --}}
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
        {{-- Hero Section --}}
{{-- HERO PREMIUM --}}
<div id="heroPengaduan"
    class="relative overflow-hidden bg-gradient-to-br from-blue-950 via-blue-900 to-indigo-900 text-white transition-all duration-500">

    {{-- Background Decoration --}}
    <div class="absolute inset-0 opacity-20">
<div class="glow-1 absolute top-0 left-0 w-72 h-72 bg-blue-400 rounded-full blur-3xl"></div>

<div class="glow-2 absolute bottom-0 right-0 w-96 h-96 bg-indigo-500 rounded-full blur-3xl"></div>
    </div>

    {{-- Pattern --}}
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0"
            style="background-image: radial-gradient(circle, white 1px, transparent 1px);
            background-size: 30px 30px;">
        </div>
    </div>

    <div class="relative container mx-auto px-4 py-20">

        <div id="heroContent" class="max-w-4xl mx-auto text-center transition-all duration-500">

            {{-- Badge --}}
            <div
                class="inline-flex items-center px-5 py-2 rounded-full bg-white/10 backdrop-blur-md border border-white/20 mb-6">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 mr-2 text-yellow-300"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>

                Portal Aspirasi Masyarakat
            </div>

            {{-- Judul --}}
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6">

                Layanan Pengaduan

                <span class="block text-blue-300">
                    Masyarakat Desa
                </span>

            </h1>

            {{-- Deskripsi --}}
            <p class="text-lg md:text-xl text-blue-100 max-w-3xl mx-auto leading-relaxed">

                Sampaikan <strong>keluhan</strong>,
                <strong>kritik</strong>, dan
                <strong>saran</strong> Anda untuk membantu meningkatkan
                kualitas pelayanan dan pembangunan Desa Smart.

            </p>

            {{-- Statistik --}}
            <div class="grid grid-cols-3 gap-4 mt-10 max-w-2xl mx-auto">

                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/10
hover:scale-110 hover:-translate-y-1 hover:bg-white/20
transition-all duration-500">
                    <div class="text-2xl font-bold">24/7</div>
                    <div class="text-sm text-blue-100">
                        Layanan Online
                    </div>
                </div>

                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/10
hover:scale-110 hover:-translate-y-1 hover:bg-white/20
transition-all duration-500">
                    <div class="text-2xl font-bold">7 Hari</div>
                    <div class="text-sm text-blue-100">
                        Maks. Respon
                    </div>
                </div>

                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/10
hover:scale-110 hover:-translate-y-1 hover:bg-white/20
transition-all duration-500">
                    <div class="text-2xl font-bold">100%</div>
                    <div class="text-sm text-blue-100">
                        Transparan
                    </div>
                </div>

            </div>

        </div>

    </div>

    {{-- Wave Bottom --}}
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

        {{-- Main Content --}}
        <main class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                {{-- Form Section --}}
                <section class="bg-white rounded-xl shadow-lg p-8 border border-blue-100">
                    <h2 class="text-2xl font-bold text-blue-900 mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        Form Pengaduan
                    </h2>

                    <form id="complaintForm" action="{{ route('pengaduan.store') }}" method="POST"
                        enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        {{-- Nama Lengkap --}}
                        <div>
                            <label for="nama_lengkap" class="block text-gray-700 font-medium mb-2 ">Nama Lengkap <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Masukkan nama anda">
                            <div id="error-nama_lengkap" class="text-red-600 text-sm mt-1"></div>
                        </div>

                        {{-- NIK --}}
                        <div>
                            <label for="nik" class="block text-gray-700 font-medium mb-2">NIK <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="nik" name="nik" required maxlength="16"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="16 digit nomor NIK">
                            <div id="error-nik" class="text-red-600 text-sm mt-1"></div>
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email (Opsional)</label>
                            <input type="email" id="email" name="email"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Masukkan email anda">
                            <div id="error-email" class="text-red-600 text-sm mt-1"></div>
                        </div>

                        {{-- Telepon --}}
                        <div>
                            <label for="telepon" class="block text-gray-700 font-medium mb-2">Nomor Telepon <span
                                    class="text-red-500">*</span></label>
                            <input type="tel" id="telepon" name="telepon" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Masukkan nomor telepon">
                            <div id="error-telepon" class="text-red-600 text-sm mt-1"></div>
                        </div>

                        {{-- Kategori --}}
                        <div>
                            <label for="kategori" class="block text-gray-700 font-medium mb-2">Kategori Pengaduan <span
                                    class="text-red-500">*</span></label>
                            <select id="kategori" name="kategori" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category }}">{{ $category }}</option>
                                @endforeach
                            </select>
                            <div id="error-kategori" class="text-red-600 text-sm mt-1"></div>
                        </div>

                        {{-- Isi Pengaduan --}}
                        <div>
                            <label for="isi_pengaduan" class="block text-gray-700 font-medium mb-2">Isi Pengaduan <span
                                    class="text-red-500">*</span></label>
                            <textarea id="isi_pengaduan" name="isi_pengaduan" rows="5" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            <div id="error-isi_pengaduan" class="text-red-600 text-sm mt-1"></div>
                        </div>

                        {{-- Lampiran --}}
                        <div>
                            <label for="lampiran" class="block text-gray-700 font-medium mb-2">Lampiran Dokumen
                                (Opsional)</label>

                            <input type="file" id="lampiran" name="lampiran" accept=".jpg,.jpeg,.png,.pdf"
                                class="
                                w-full 
                                text-sm text-gray-900 
                                border border-gray-300 
                                rounded
                                cursor-pointer 
                                bg-gray-50 
                                p-2.5 
                                file:mr-4 file:py-2 file:px-4 
                                file:rounded file:border-0
                                file:text-sm file:font-semibold
                                file:bg-gray-600 file:text-white
                                hover:file:bg-gray-700">
                            <p class="text-xs text-gray-600 mt-1">Format: JPG, PNG, PDF. Ukuran Maksimum: 2MB.</p>
                            <div id="error-lampiran" class="text-red-600 text-sm mt-1"></div>
                        </div>

                        {{-- Submit Button --}}
                        <div class="pt-2">
                            <button type="submit" id="submitBtn"
                                class="w-full bg-blue-900 text-white py-3 px-6 rounded-lg hover:bg-blue-800 transition font-semibold">
                                Kirim Pengaduan
                            </button>
                        </div>
                    </form>
                </section>

                {{-- Info Section (sama seperti sebelumnya) --}}
                {{-- Kolom Kanan: Info & Status Pengaduan --}}
                <section class="space-y-8 animate-fadeIn">
                    <div class="bg-white rounded-xl shadow-lg p-8 border border-blue-100">
                        <h2 class="text-2xl font-bold text-blue-900 mb-4 flex items-center">
                            <i data-feather="info" class="mr-2"></i> Informasi Pengaduan
                        </h2>
                        <div class="space-y-4 text-gray-700">
                            <p>Layanan pengaduan ini merupakan sarana bagi masyarakat untuk menyampaikan keluhan, kritik,
                                dan saran terkait penyelenggaraan pemerintahan dan pembangunan di Desa Smart</p>
                            <div class="bg-blue-50 p-4 rounded-lg">
                                <h3 class="font-semibold text-blue-900 mb-2">Proses Penanganan Pengaduan:</h3>
                                <ol class="list-decimal list-inside space-y-2">
                                    <li>Pengaduan diterima oleh administrasi desa</li>
                                    <li>Divalidasi dan diverifikasi oleh tim verifikasi</li>
                                    <li>Diteruskan ke unit terkait untuk ditindaklanjuti</li>
                                    <li>Proses penyelesaian dan monitoring</li>
                                    <li>Feedback diberikan kepada pelapor</li>
                                </ol>
                            </div>
                            <div class="border-t border-gray-200 pt-4">
                                <h3 class="font-semibold text-blue-900 mb-2">Ketentuan:</h3>
                                <ul class="list-disc list-inside space-y-2">
                                    <li>Pengaduan harus disampaikan dengan bahasa yang sopan dan jelas</li>
                                    <li>Lampirkan bukti pendukung jika memungkinkan</li>
                                    <li>Pengaduan anonim tidak akan diproses</li>
                                    <li>Waktu respon maksimal 7 hari kerja</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div id="initial-view"
                        class="bg-white rounded-xl shadow-lg p-8 border border-blue-100 transition-all duration-300">
                        <h2 class="text-2xl font-bold text-blue-900 mb-6 flex items-center">
                            <i data-feather="check-circle" class="mr-2"></i> Cek Status Pengaduan
                        </h2>
                        <div class="space-y-4">
                            <button id="check-status-button"
                                class="w-full bg-blue-900 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-800 transition duration-150">
                                Cek Status
                            </button>
                        </div>
                    </div>

                    {{-- form cek status --}}
                    <div id="input-form-view"
                        class="hidden bg-white rounded-xl shadow-lg p-8 border border-blue-100 mt-6 transition-all duration-300">
                        <h2 class="text-2xl font-bold text-blue-900 mb-6 flex items-center">
                            <i data-feather="search" class="mr-2"></i> Masukkan Kode Pengaduan
                        </h2>
                        <form action="/check-status" method="GET" class="space-y-6">
                            <div>
                                <label for="complaint-code" class="block text-sm font-medium text-gray-700 mb-2">Kode
                                    Status Pengaduan</label>
                                <input type="text" id="complaint-code" name="code" required
                                    placeholder="Contoh: KPD-2025-00123"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                                <p class="mt-2 text-sm text-gray-500">Masukkan kode unik pengaduan Anda untuk melihat
                                    statusnya.</p>
                            </div>

                            <button type="submit"
                                class="w-full bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition duration-150">
                                Cari Status
                            </button>
                        </form>
                        <button id="back-button"
                            class="mt-4 w-full text-blue-900 px-6 py-2 rounded-lg font-semibold hover:text-blue-700 transition duration-150 text-sm">
                            &larr; Kembali
                        </button>
                    </div>
                </section>
            </div>
        </main>
    </section>

    {{-- LOAD LIBRARY DI SINI (SEBELUM SCRIPT) --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    {{-- SCRIPT LANGSUNG INLINE --}}
    <script type="text/javascript">
        console.log('=== SCRIPT LOADED ===');
        console.log('Swal:', typeof Swal);
        console.log('Form:', document.getElementById('complaintForm'));

        // Tunggu DOM ready
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM Ready!');

            const form = document.getElementById('complaintForm');
            const btn = document.getElementById('submitBtn');

            if (!form) {
                console.error('Form tidak ditemukan!');
                return;
            }

            console.log('Form found, adding event listener...');

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                console.log('FORM SUBMITTED VIA AJAX!');

                // Disable button
                btn.disabled = true;
                btn.textContent = 'Mengirim...';

                // Clear errors
                document.querySelectorAll('[id^="error-"]').forEach(el => el.textContent = '');

                // Prepare data
                const formData = new FormData(form);

                // Send AJAX request
                fetch('{{ route('pengaduan.store') }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Response:', data);

                        if (data.success) {
                            // SUCCESS - Show SweetAlert
                            Swal.fire({
                                icon: 'success',
                                title: 'Pengaduan Terkirim!',
                                html: `
        <p class="mb-4">Terima kasih, pengaduan Anda telah kami terima.</p>
        <p class="mb-4 text-red-500">Note: Harap simpan Nomor Tiket Anda.</p>
        <div class="bg-blue-50 border-2 border-blue-200 p-4 rounded-lg">
            <p class="text-sm text-gray-600 mb-2">Nomor Tiket Anda:</p>
            <p class="text-2xl font-bold text-blue-900">${data.ticket_number}</p>
        </div>
    `,
                                confirmButtonColor: '#1e3a8a',
                                confirmButtonText: 'OK'
                            });

                            // Reset form
                            form.reset();
                        } else {
                            // Validation errors
                            if (data.errors) {
                                for (let field in data.errors) {
                                    const errorDiv = document.getElementById('error-' + field);
                                    if (errorDiv) {
                                        errorDiv.textContent = data.errors[field][0];
                                    }
                                }
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: 'Gagal mengirim pengaduan. Silakan coba lagi.'
                        });
                    })
                    .finally(() => {
                        // Re-enable button
                        btn.disabled = false;
                        btn.textContent = 'Kirim Pengaduan';
                    });
            });
        });

        // javascript cek status    
        feather.replace();

        // Logika sederhana untuk menampilkan/menyembunyikan form
        const initialView = document.getElementById('initial-view');
        const inputFormView = document.getElementById('input-form-view');
        const checkStatusButton = document.getElementById('check-status-button');
        const backButton = document.getElementById('back-button');

        checkStatusButton.addEventListener('click', () => {
            initialView.classList.add('hidden');
            inputFormView.classList.remove('hidden');
        });

        backButton.addEventListener('click', () => {
            inputFormView.classList.add('hidden');
            initialView.classList.remove('hidden');
        });
    </script>
    <script>
window.addEventListener('scroll', function() {

    const hero = document.getElementById('heroPengaduan');
    const content = document.getElementById('heroContent');

    if (!hero || !content) return;

    const scrollY = window.scrollY;

    // Zoom background
    const scale = 1 + (scrollY * 0.0004);

    // Geser konten lebih lambat
    const translateY = scrollY * 0.35;

    // Fade Out
    const opacity = Math.max(1 - scrollY / 500, 0);

    hero.style.transform = `scale(${scale})`;

    content.style.transform = `translateY(${translateY}px)`;

    content.style.opacity = opacity;

});
</script>
@endsection

@extends('layouts.app')

@section('title', 'Data Pertanahan')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
AOS.init({
    duration: 700,
    easing: 'ease-out-cubic',
    once: true,
    offset: 120
});
</script>
<style>
[data-aos="zoom-in"]{
    transform: scale(.92);
}

[data-aos="zoom-in"].aos-animate{
    transform: scale(1);
}

/* Modal PDF Viewer */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
}

.modal.show {
    display: flex;
    align-items: center;
    justify-content: center;
}

.modal-content {
    background-color: white;
    border-radius: 10px;
    width: 90%;
    height: 90vh;
    max-width: 1000px;
    display: flex;
    flex-direction: column;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
}

.modal-header {
    padding: 15px 20px;
    border-bottom: 1px solid #e5e7eb;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #f9fafb;
}

.modal-header h2 {
    margin: 0;
    font-size: 18px;
}

.modal-body {
    flex: 1;
    overflow: hidden;
}

.modal-body iframe {
    width: 100%;
    height: 100%;
    border: none;
}

.close-modal {
    cursor: pointer;
    font-size: 28px;
    font-weight: bold;
    color: #6b7280;
    transition: color 0.2s;
    line-height: 1;
}

.close-modal:hover {
    color: #000;
}

.pdf-link {
    display: inline-block;
    padding: 6px 12px;
    background-color: #3b82f6;
    color: white;
    border-radius: 6px;
    text-decoration: none;
    font-size: 12px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    border: none;
}

.pdf-link:hover {
    background-color: #2563eb;
    transform: scale(1.05);
}
.pdf-link:active {
    transform: scale(0.98);
}

.image-link {
    display: inline-block;
    padding: 6px 12px;
    background-color: #8b5cf6;
    color: white;
    border-radius: 6px;
    text-decoration: none;
    font-size: 12px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    border: none;
}

.image-link:hover {
    background-color: #7c3aed;
    transform: scale(1.05);
}

.image-link:active {
    transform: scale(0.98);
}

.spatial-link {
    display: inline-block;
    padding: 6px 12px;
    background-color: #10b981;
    color: white;
    border-radius: 6px;
    text-decoration: none;
    font-size: 12px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
}

.spatial-link:hover {
    background-color: #059669;
    transform: scale(1.05);
}

.spatial-link:active {
    transform: scale(0.98);
}

/* Mobile responsive */
@media (max-width: 768px) {
    .modal-content {
        width: 95%;
        height: 95vh;
    }
    
    .modal-header {
        padding: 12px 15px;
    }
    
    .modal-header h2 {
        font-size: 16px;
    }
}
</style>
<div class="min-h-screen py-10" style=" background: linear-gradient (180deg, #f8fbff 0%, #eef5ff 50%, #ffffff 100%);
">
    <div class="container mx-auto px-4">

<div data-aos="fade-down" class="relative overflow-hidden rounded-[35px] mb-12 shadow-2xl">

    <div class="absolute inset-0 bg-gradient-to-r from-blue-900 via-blue-700 to-cyan-500"></div>

    <div class="absolute right-0 top-0 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>

    <div class="absolute left-20 bottom-0 w-72 h-72 bg-cyan-300/20 rounded-full blur-3xl"></div>

    <div class="relative p-10 lg:p-16 text-white">

        <div class="grid lg:grid-cols-2 gap-10 items-center">

            <div>

                <span class="bg-white/20 px-4 py-2 rounded-full text-sm">
                    🏘️ Bidang Pertanahan
                </span>

                <h1 class="text-5xl lg:text-7xl font-black mt-5 leading-tight">

                    SIP SUPER

                </h1>

                <p class="mt-5 text-blue-100 text-lg">

                    Sistem Informasi Prasarana, Sarana, dan Utilitas PERumahan

                </p>

            </div>

            <div>

                <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-8 border border-white/20">

                    <div class="text-center">

                        <div class="text-lg text-blue-100">

                            Total PSU Perumahan

                        </div>

                        <div class="text-7xl font-black mt-3">

                            {{ number_format($totalPertanahan) }}

                        </div>

                        <div class="mt-2 text-blue-100">

                            Bidang

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</div>


{{-- TABEL DATA PERTANAHAN --}}
<div
    data-aos="zoom-in"
    data-aos-duration="700"
    class="bg-white rounded-[30px] shadow-xl overflow-hidden">

    <div class="bg-gradient-to-r from-blue-900 to-blue-600 text-white px-8 py-5">
        <h3 class="font-bold text-xl">
            🏘️ Data PSU Perumahan  
        </h3>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-slate-100 text-slate-700">
                    <th class="p-4 text-left text-sm font-semibold">Nama Perumahan</th>
                    <th class="p-4 text-left text-sm font-semibold">Peruntukan</th>
                    <th class="p-4 text-left text-sm font-semibold">Luas</th>
                    <th class="p-4 text-left text-sm font-semibold">Kelurahan</th>
                    <th class="p-4 text-left text-sm font-semibold">Kecamatan</th>
                    <th class="p-4 text-left text-sm font-semibold">Bukti Perolehan</th>
                    <th class="p-4 text-left text-sm font-semibold">Status Saat Ini</th>
                    <th class="p-4 text-left text-sm font-semibold">Peta Bidang</th>
                    <th class="p-4 text-left text-sm font-semibold">Peta Spasial</th>
                    <th class="p-4 text-left text-sm font-semibold">Penyerahan Aset</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dataPertanahan as $item)
                <tr class="border-b hover:bg-slate-50 transition">
                    <td class="p-4 font-medium text-slate-700">{{ $item->nama_perumahan }}</td>
                    <td class="p-4 text-slate-700">{{ $item->peruntukan }}</td>
                    <td class="p-4 text-slate-700">{{ $item->luas }}</td>
                    <td class="p-4 text-slate-700">{{ $item->kelurahan }}</td>
                    <td class="p-4 text-slate-700">{{ $item->kecamatan }}</td>
                    <td class="p-4">
                        @if($item->bukti_perolehan)
                            <span class="text-slate-700">{{ $item->bukti_perolehan }}</span>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="p-4">
                        <span class="inline-block px-3 py-1 text-xs font-medium rounded-full
                            @if($item->status_saat_ini == 'belum diproses') bg-yellow-100 text-yellow-800
                            @elseif($item->status_saat_ini == 'proses pensertifikatan') bg-blue-100 text-blue-800
                            @elseif($item->status_saat_ini == 'sertifikat terbit') bg-green-100 text-green-800
                            @endif
                        ">
                            {{ ucfirst($item->status_saat_ini) }}
                        </span>
                    </td>
                    <td class="p-4">
                        @if($item->peta_bidang)
                            <button class="image-link" onclick="openImageModal('{{ asset('storage/' . $item->peta_bidang) }}', 'Peta Bidang')">
                                🗺️ Lihat Peta
                            </button>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="p-4">
                        @if($item->peta_spasial)
                            <a href="{{ $item->peta_spasial }}" target="_blank" class="spatial-link">
                                🔗 Lihat Peta
                            </a>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="p-4">
                        @if($item->penyerahan_ke_bagian_aset)
                            <span class="text-slate-700">{{ $item->penyerahan_ke_bagian_aset }}</span>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="p-8 text-center text-slate-500">
                        Tidak ada data pertanahan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="bg-slate-50 px-8 py-5 border-t border-slate-200">
        <div class="flex justify-center">
            {{ $dataPertanahan->links() }}
        </div>
    </div>
</div>

<!-- PDF Modal -->
<div id="pdfModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="pdfTitle" class="font-bold text-lg"></h2>
            <span class="close-modal" onclick="closePdfModal()">&times;</span>
        </div>
        <div class="modal-body">
            <iframe id="pdfViewer" src="" frameborder="0"></iframe>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div id="imageModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="imageTitle" class="font-bold text-lg"></h2>
            <span class="close-modal" onclick="closeImageModal()">&times;</span>
        </div>
        <div class="modal-body" style="display: flex; align-items: center; justify-content: center; background-color: #f3f4f6;">
            <img id="imageViewer" src="" style="max-width: 100%; max-height: 100%; object-fit: contain;">
        </div>
    </div>
</div>

<script>
function openPdfModal(pdfUrl, title) {
    const modal = document.getElementById('pdfModal');
    const pdfViewer = document.getElementById('pdfViewer');
    const pdfTitle = document.getElementById('pdfTitle');
    
    pdfTitle.textContent = title;
    
    // Method 1: Try direct PDF viewing via iframe
    pdfViewer.src = pdfUrl;
    
    // If direct viewing doesn't work, fallback to Google Docs Viewer
    pdfViewer.onerror = function() {
        pdfViewer.src = `https://docs.google.com/gview?url=${encodeURIComponent(pdfUrl)}&embedded=true`;
    };
    
    modal.classList.add('show');
    document.body.style.overflow = 'hidden';
}

function closePdfModal() {
    const modal = document.getElementById('pdfModal');
    modal.classList.remove('show');
    document.getElementById('pdfViewer').src = '';
    document.body.style.overflow = 'auto';
}

function openImageModal(imageUrl, title) {
    const modal = document.getElementById('imageModal');
    const imageViewer = document.getElementById('imageViewer');
    const imageTitle = document.getElementById('imageTitle');
    
    imageTitle.textContent = title;
    imageViewer.src = imageUrl;
    modal.classList.add('show');
    document.body.style.overflow = 'hidden';
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.classList.remove('show');
    document.getElementById('imageViewer').src = '';
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside of it
window.onclick = function(event) {
    const pdfModal = document.getElementById('pdfModal');
    const imageModal = document.getElementById('imageModal');
    if (event.target === pdfModal) {
        closePdfModal();
    }
    if (event.target === imageModal) {
        closeImageModal();
    }
}

// Close modal with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closePdfModal();
        closeImageModal();
    }
});
</script>

@endsection

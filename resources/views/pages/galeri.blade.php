@extends('layouts.app')

@section('title', 'Galeri')

@section('content')

<section class="py-16 bg-gray-50">

    <div class="container mx-auto px-4">

        <div class="text-center mb-12">

            <h2 class="text-4xl font-bold text-gray-800">
                Galeri
            </h2>

            <p class="text-gray-500 mt-3">
                Dokumentasi kegiatan dan potret wilayah
            </p>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($galleries as $gallery)

<div
    onclick="openImage('{{ asset('storage/' . $gallery->foto) }}','{{ $gallery->judul }}')"
    class="relative cursor-pointer group overflow-hidden rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">

    <!-- Foto -->
    <img
        src="{{ asset('storage/' . $gallery->foto) }}"
        alt="{{ $gallery->judul }}"
        class="w-full h-80 object-cover transition duration-700 group-hover:scale-110">

    <!-- Overlay Gradient -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>

    <!-- Efek Glow -->
    <div class="absolute inset-0 bg-black/10 group-hover:bg-black/0 transition duration-500"></div>

    <!-- Judul -->
    <div class="absolute bottom-0 left-0 right-0 p-6">

        <h3 class="text-white text-1xl font-bold drop-shadow-lg leading-snug">
            {{ $gallery->judul }}
        </h3>

        <div class="mt-3 flex items-center text-white/80 text-sm">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-4 h-4 mr-2"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 10l4.553-4.553a1.5 1.5 0 112.121 2.121L17.121 12l4.553 4.553a1.5 1.5 0 01-2.121 2.121L15 14.121l-4.553 4.553a1.5 1.5 0 01-2.121-2.121L12.879 12 8.326 7.447a1.5 1.5 0 112.121-2.121L15 9.879z"
                    class="hidden"/>
            </svg>

        </div>

    </div>

</div>

            @endforeach

        </div>

    </div>

</section>

<!-- MODAL LIGHTBOX -->
<div id="imageModal"
    class="fixed inset-0 bg-black/95 z-[9999] hidden items-center justify-center p-4">

    <!-- Tombol Close -->
    <button
        onclick="closeImage()"
        class="absolute top-5 right-6 text-white text-5xl hover:text-red-400 transition">

        &times;

    </button>

    <!-- Gambar -->
    <div class="max-w-6xl w-full text-center">

        <img
            id="modalImage"
            src=""
            class="max-h-[85vh] mx-auto rounded-2xl shadow-2xl animate-zoom">

        <h3
            id="modalTitle"
            class="text-white text-xl md:text-2xl font-semibold mt-5">
        </h3>

    </div>

</div>

<style>
@keyframes zoomIn {

    from {
        transform: scale(.8);
        opacity: 0;
    }

    to {
        transform: scale(1);
        opacity: 1;
    }
}

.animate-zoom {
    animation: zoomIn .35s ease;
}
</style>

<script>

function openImage(src, title)
{
    document.getElementById('modalImage').src = src;
    document.getElementById('modalTitle').innerText = title;

    const modal = document.getElementById('imageModal');

    modal.classList.remove('hidden');
    modal.classList.add('flex');

    document.body.style.overflow = 'hidden';
}

function closeImage()
{
    const modal = document.getElementById('imageModal');

    modal.classList.add('hidden');
    modal.classList.remove('flex');

    document.body.style.overflow = 'auto';
}

// Klik area hitam untuk menutup
document.getElementById('imageModal').addEventListener('click', function(e){

    if(e.target === this)
    {
        closeImage();
    }

});

// ESC untuk menutup
document.addEventListener('keydown', function(e){

    if(e.key === 'Escape')
    {
        closeImage();
    }

});
</script>

@endsection
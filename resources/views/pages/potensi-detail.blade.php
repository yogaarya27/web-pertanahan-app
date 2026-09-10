@extends('layouts.app')

@section('title', trim(preg_replace('/\s*desa\s*/i', ' ', $potensi->title)))

@section('content')

<div class="bg-gray-50 py-20">

    <div class="max-w-7xl mx-auto px-4">

        <!-- Breadcrumb -->
        <div class="mb-8 text-sm text-gray-500">

            <a href="{{ route('home') }}">Home</a>

            <span class="mx-2">/</span>

            <a href="{{ route('profildesa') }}">Potensi Desa</a>

            <span class="mx-2">/</span>

            <span>{{ $potensi->title }}</span>

        </div>

        <div class="grid lg:grid-cols-3 gap-10">

            <!-- Konten -->
            <div class="lg:col-span-2">

                <h1 class="text-5xl font-bold text-gray-900 mb-4">
                    {{ $potensi->title }}
                </h1>

                <div class="flex items-center gap-4 text-gray-500 mb-8">

                    <span>
                        {{ $potensi->created_at->format('d F Y') }}
                    </span>

                </div>

                <!-- Image -->
                <img
                    src="{{ asset('storage/'.$potensi->image) }}"
                    class="w-full h-[550px] rounded-3xl object-cover shadow-xl mb-10">

                <!-- Content -->
                <div class="prose prose-lg max-w-none">

                    {!! $potensi->description !!}

                </div>

            </div>

            <!-- Sidebar -->
            <aside>

                <div class="sticky top-24">

                    <div class="bg-white rounded-3xl shadow-lg p-6">

                        <h3 class="text-2xl font-bold mb-6">
                            Potensi Lainnya
                        </h3>

                        <div class="space-y-5">
@foreach($potensiLainnya as $index => $item)

<a
    href="{{ route('potensi.show', $item->slug) }}"
    data-aos="fade-up"
    data-aos-delay="{{ $index * 100 }}"
    class="group flex gap-4 p-3 rounded-2xl hover:bg-blue-50 transition-all duration-300">

    <div class="overflow-hidden rounded-xl">

        <img
            src="{{ asset('storage/'.$item->image) }}"
            class="w-24 h-20 object-cover group-hover:scale-110 transition duration-500">

    </div>

    <div class="flex-1">

        <h4 class="font-semibold text-slate-800 group-hover:text-blue-600 transition">

            {{ Str::limit($item->title, 45) }}

        </h4>

        <p class="text-sm text-gray-500 mt-1">

            {{ $item->created_at->format('d M Y') }}

        </p>

        <div class="flex items-center mt-2 text-blue-600 text-sm font-medium">

            Baca Detail

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-4 h-4 ml-1 group-hover:translate-x-1 transition"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 5l7 7-7 7"/>

            </svg>

        </div>

    </div>

</a>

@endforeach

                        </div>

                    </div>

                </div>

            </aside>

        </div>

    </div>

</div>

@endsection
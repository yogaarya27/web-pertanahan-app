@foreach ($news as $new)
<a href="{{ route('news.show', $new->slug) }}"
   class="block bg-white rounded shadow-md overflow-hidden hover:shadow-lg transition duration-300 w-full max-w-sm">

    <img src="{{ asset('storage/' . $new->thumbnail) }}"
         alt="{{ $new->title }}"
         class="w-full h-48 object-cover">

    <div class="p-4 text-left">

        <span class="text-xs text-blue-600 font-semibold uppercase">
            {{ $new->newsCategory->title }}
        </span>

        <h3 class="text-lg font-bold text-gray-800 mt-2 mb-2 line-clamp-2">
            {{ $new->title }}
        </h3>

        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
            {{ Str::limit(strip_tags($new->content), 150) }}
        </p>

        <div class="flex items-center justify-between text-xs text-gray-500">
            <span>{{ $new->updated_at->format('d M Y') }}</span>
            <span>
                <i class="far fa-eye"></i> {{ $new->views }} views
            </span>
        </div>

    </div>

</a>
@endforeach
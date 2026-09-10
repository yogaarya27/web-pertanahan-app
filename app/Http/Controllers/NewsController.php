<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Banner;

class NewsController extends Controller
{
    public function index()
    {

        $news = News::latest()->take(3)->get();
        $banners = Banner::all();
        $featureds = News::where('is_featured', true)->get();
        return view('pages.news.berita', compact('news', 'banners', 'featureds'));
    }
public function loadMore(Request $request)
{
    $offset = $request->offset ?? 3;

    $news = News::latest()
        ->skip($offset)
        ->take(3)
        ->get();

    return response()->json($news);
}
public function show($slug)
{
    $news = News::where('slug', $slug)->firstOrFail();

    // 🔥 TAMBAHKAN INI UNTUK VIEW COUNT
    $news->increment('views');

    $newests = News::orderby('created_at', 'desc')
        ->take(3)
        ->get();

    $categories = News::where('news_category_id', $news->news_category_id)
        ->where('id', '!=', $news->id)
        ->orderby('created_at', 'desc')
        ->take(4)
        ->get();

    return view('pages.news.detailnews', compact(
        'news', 'newests', 'categories'
    ));
}

    public function view($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

        // Tambah jumlah views setiap kali berita dibuka
        $news->increment('views');

        return view('news.show', compact('news'));

        if (!request()->hasCookie($cookieName)) {
            $news->increment('views');
            cookie()->queue(cookie($cookieName, true, 5)); // berlaku 5 menit
        }

        return view('news.show', compact('news'));
    }
}

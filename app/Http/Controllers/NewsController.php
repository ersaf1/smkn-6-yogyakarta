<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::where('is_published', true)->with('category');

        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $news = $query->orderBy('published_at', 'desc')->paginate(9);
        $categories = NewsCategory::where('is_active', true)->orderBy('order')->get();

        return view('news.index', compact('news', 'categories'));
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)
            ->where('is_published', true)
            ->with('category')
            ->firstOrFail();

        $relatedNews = News::where('is_published', true)
            ->where('id', '!=', $news->id)
            ->where('category_id', $news->category_id)
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        return view('news.show', compact('news', 'relatedNews'));
    }
}

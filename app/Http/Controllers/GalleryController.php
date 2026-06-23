<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::where('is_active', true);

        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $galleries = $query->orderBy('order')->paginate(12);
        $categories = GalleryCategory::where('is_active', true)->orderBy('order')->get();

        return view('gallery.index', compact('galleries', 'categories'));
    }
}

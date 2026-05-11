<?php

namespace App\Http\Controllers\Web;

use App\Models\Gallery;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::published()
            ->ordered()
            ->get();

        return view('website.gallery.index', compact('galleries'));
    }

    public function show(string $slug): View
    {
        $gallery = Gallery::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('website.gallery.show', compact('gallery'));
    }
}

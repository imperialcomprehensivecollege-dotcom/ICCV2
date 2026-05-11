<?php

namespace App\Http\Controllers\Web;

use App\Models\Page;
use Illuminate\View\View;

class PageController extends Controller
{
    public function show($slug): View
    {
        $page = Page::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('website.page', compact('page'));
    }

    public function about(): View
    {
        return $this->show('about');
    }

    public function academics(): View
    {
        return $this->show('academics');
    }
}

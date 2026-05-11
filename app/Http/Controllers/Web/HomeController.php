<?php

namespace App\Http\Controllers\Web;

use App\Models\Page;
use App\Models\Post;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Admission;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredPosts = Post::published()
            ->featured()
            ->latest()
            ->limit(3)
            ->get();

        $recentPosts = Post::published()
            ->latest()
            ->limit(6)
            ->get();

        $categories = Category::withCount('posts')->get();
        $galleries = Gallery::published()->ordered()->limit(3)->get();

        return view('website.home', compact(
            'featuredPosts',
            'recentPosts',
            'categories',
            'galleries'
        ));
    }
}

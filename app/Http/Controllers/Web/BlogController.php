<?php

namespace App\Http\Controllers\Web;

use App\Models\Post;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Pagination\Paginator;

class BlogController extends Controller
{
    public function index(): View
    {
        $posts = Post::published()
            ->latest()
            ->paginate(12);

        $categories = Category::withCount('posts')->get();

        return view('website.blog.index', compact('posts', 'categories'));
    }

    public function show(string $slug): View
    {
        $post = Post::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $relatedPosts = Post::published()
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->limit(3)
            ->get();

        return view('website.blog.show', compact('post', 'relatedPosts'));
    }

    public function category(string $slug): View
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $posts = $category->posts()
            ->where('is_published', true)
            ->latest()
            ->paginate(12);

        $categories = Category::withCount('posts')->get();

        return view('website.blog.category', compact('category', 'posts', 'categories'));
    }
}

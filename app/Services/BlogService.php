<?php

namespace App\Services;

use App\Models\Post;

class BlogService
{
    public function getFeaturedPosts(int $limit = 3)
    {
        return Post::published()
            ->featured()
            ->latest()
            ->limit($limit)
            ->get();
    }

    public function getRecentPosts(int $limit = 6)
    {
        return Post::published()
            ->latest()
            ->limit($limit)
            ->get();
    }

    public function getPostsByCategory($categoryId, int $limit = 12)
    {
        return Post::where('category_id', $categoryId)
            ->published()
            ->latest()
            ->paginate($limit);
    }

    public function getRelatedPosts($post, int $limit = 3)
    {
        return Post::published()
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->limit($limit)
            ->get();
    }

    public function searchPosts(string $query, int $limit = 12)
    {
        return Post::published()
            ->where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")
            ->orWhere('excerpt', 'like', "%{$query}%")
            ->latest()
            ->paginate($limit);
    }
}
